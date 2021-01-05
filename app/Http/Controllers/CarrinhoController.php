<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Services\VendaService;
use PagSeguro\Configuration\Configure;

class CarrinhoController extends Controller
{
    public function __construct(){
        $this->_configs = new Configure();
        $this->_configs->setCharset("UTF-8");
        $this->_configs->setAccountCredentials(env('PAGSEGURO_EMAIL'),env('PAGSEGURO_TOKEN'));
        $this->_configs->setEnvironment(env('PAGSEGURO_AMBIENTE'));
        $this->_configs->setLog(true,storage_path("logs/pagseguro_".date("Y-m-d").'.log'));
    }

    public function getCredential(){
        return $this->_configs->getAccountCredentials();
    }

    public function index(Request $request){
        $carrinho = session('cart');
        return view("cart",compact('carrinho'));
    }

    public function store(Request $request, $idproduto){
        $prod = Produto::find($idproduto);
        if($prod){
            $carrinho = session('cart',[]);
            array_push($carrinho, $prod);
            session(['cart'=>$carrinho]);
        }
        return redirect()->route("home");
    }

    public function destroy(Request $request, $index){
        $carrinho = session('cart');
        if(isset($carrinho[$index])){
            unset($carrinho[$index]);
            session(['cart'=>$carrinho]);
        }
        return redirect()->route("cart.index");
    }

    public function finish(Request $request){

        $prods = session('cart',[]);
        $vendaService = new VendaService();
        $result = $vendaService->finishSale( $prods , \Auth::user() );

        if($result['status'] == 'ok'){
            //$request->session()->forget('cart');
            $credCard = new \PagSeguro\Domains\Requests\DirectPayment\CreditCard();
            $credCard->setReference("Ped_".$result['idpedido']);
            $credCard->setCurrency("BRL");

            foreach($prods as $p){
                $credCard->addItems()->withParameters(
                    $p->id,
                    $p->nome,
                    1,
                    number_format($p->valor,2,".","")
                );
            }

            $user = \Auth::user();
            $credCard->setSender()->setName($user->nome. " ".$user->nome);
            //$credCard->setSender()->setEmail($user->email);
            $credCard->setSender()->setEmail($user->login."@sandbox.pagseguro.com.br");
            $credCard->setSender()->setHash($request->input('hashseller'));
            $credCard->setSender()->setPhone()->withParameters(21,980232356);
            $credCard->setSender()->setDocument()->withParameters("CPF",$user->login);

            $credCard->setShipping()->setAddress()->withParameters("Av. A","132","Jardim Tul","18078-699","Rio de Janeiro","RJ","BRA","Apt.100");
            $credCard->setBilling()->setAddress()->withParameters("Av. A","132","Jardim Tul","18078-699","Rio de Janeiro","RJ","BRA","Apt.100");

            $credCard->setToken($request->input("cardToken"));

            $nparcela = $request->input("nparcela");
            $totalParcela = $request->input("totalInstallment");
            $credCard->setInstallment()->withParameters(1,30.00);

            $credCard->setHolder()->setName($user->nome. " ".$user->nome);
            $credCard->setHolder()->setDocument()->withParameters("CPF",$user->login);
            $credCard->setHolder()->setBirthDate("01/01/2000");
            $credCard->setHolder()->setPhone()->withParameters(21,980232356);

            $credCard->setMode("DEFAULT");
            $result = $credCard->register($this->getCredential());
            dd($result);
            echo "Compra realizada com sucesso";
        }else{
            echo "Compra não realizada";

        }

        //$request->session()->flash($result['status'],$result['message']);
        //return redirect()->route("cart.index");
    }

}
