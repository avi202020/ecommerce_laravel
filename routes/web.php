<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\PagamentoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::match(['get','post'], '/', [ProdutoController::class, 'index'])->name('home');

Route::match(['get','post'], '/categoria', [ProdutoController::class, 'categoria'])->name('categoria');
Route::match(['get','post'], '/{id}/categoria', [ProdutoController::class, 'categoria'])->name('categoria.byId');

Route::match(['get','post'], '/cadastrar', [ClienteController::class, 'cadastrar'])->name('cadastrar');
Route::match(['get','post'], '/cadastrar_post', [ClienteController::class, 'store'])->name('cadastrar.store');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::match(['get','post'], '/{idproduto}/carrinho/adicionar', [CarrinhoController::class, 'store'])->name('cart.store');
Route::match(['get','post'], '/carrinho', [CarrinhoController::class, 'index'])->name('cart.index');
Route::match(['get','post'], '/carrinho/{index}/destroy', [CarrinhoController::class, 'destroy'])->name('cart.destroy');

/* PAINEL CLIENTE */
Route::group(['prefix'=>'painel','middleware'=>'auth'], function(){
    Route::post('/carrinho/finalizar', [CarrinhoController::class, 'finish'])->name('cart.finish');
    Route::get('/pedidos', [PedidosController::class, 'index'])->name('pedidos');
    Route::post('/pedidos/detalhes', [PedidosController::class, 'show'])->name('pedidos.show');
    Route::match(['get','post'], '/pedidos/pagar', [PagamentoController::class, 'store'])->name('payment');
});



