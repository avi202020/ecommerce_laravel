<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\ProdutoController;
use App\Http\Controllers\Frontend\ClienteController;
use App\Http\Controllers\Frontend\CarrinhoController;
use App\Http\Controllers\Frontend\PedidosController;
use App\Http\Controllers\Frontend\PagamentoController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductsController;

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\LoginController;

use App\Models\Produto;

/* FRONTEND */
Route::group(['prefix'=>'/'], function(){
    Route::match(['get','post'], '/', [ProdutoController::class, 'index'])->name('home');

    Route::match(['get','post'], 'categoria', [ProdutoController::class, 'categoria'])->name('categoria');
    Route::match(['get','post'], '{id}/categoria', [ProdutoController::class, 'categoria'])->name('categoria.byId');

    Route::match(['get','post'], 'cadastrar', [ClienteController::class, 'cadastrar'])->name('cadastrar');
    Route::match(['get','post'], 'cadastrar_post', [ClienteController::class, 'store'])->name('cadastrar.store');

    Route::match(['get','post'], '{idproduto}/carrinho/adicionar', [CarrinhoController::class, 'store'])->name('cart.store');
    Route::match(['get','post'], 'carrinho', [CarrinhoController::class, 'index'])->name('cart.index');
    Route::match(['get','post'], 'carrinho/{index}/destroy', [CarrinhoController::class, 'destroy'])->name('cart.destroy');

    Route::get('forgot-password',[ForgotPasswordController::class,'index'])->name('forgot.password');
    Route::post('forgot-password',[ForgotPasswordController::class,'store'])->name('forgot.password');
    Route::get('reset-password/{token}', [ResetPasswordController::class,'index'])->name('reset.password');
    Route::post('reset-password/{token}', [ResetPasswordController::class,'store'])->name('reset.password');
});

/* PAINEL CLIENTE */
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.store');
Route::get('logout', [LoginController::class, 'destroy'])->name('logout');

Route::group(['prefix'=>'painel','middleware'=>'auth'], function(){
    Route::post('carrinho/finalizar', [CarrinhoController::class, 'finish'])->name('cart.finish');

    Route::group(['prefix'=>'pedidos'], function(){
        Route::get('/', [PedidosController::class, 'index'])->name('pedidos');
        Route::post('detalhes', [PedidosController::class, 'show'])->name('pedidos.show');
        Route::match(['get','post'], 'pagar', [PagamentoController::class, 'store'])->name('payment');
    });
});

/* PAINEL ADMIN */
Route::group(['prefix'=>'admin'], function(){
    Route::get('login', [AdminLoginController::class,'index'])->name('admin.login');
    Route::post('login', [AdminLoginController::class,'store'])->name('admin.login');
    Route::get('logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('forgot-password',[ForgotPasswordController::class,'index'])->name('admin.forgot.password');
    Route::post('forgot-password',[ForgotPasswordController::class,'store'])->name('admin.forgot.password');
    Route::get('reset-password/{token}', [ResetPasswordController::class,'index'])->name('admin.reset.password');
    Route::post('reset-password/{token}', [ResetPasswordController::class,'store'])->name('admin.reset.password');
});

Route::group(['prefix'=>'admin','middleware'=>'auth:admin'], function(){
    Route::get('/', [AdminController::class,'index'])->name('admin');

    Route::resource('products',ProductsController::class);
});





