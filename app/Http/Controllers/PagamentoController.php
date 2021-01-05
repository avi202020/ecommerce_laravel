<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PagSeguro\Configuration\Configure;

class PagamentoController extends Controller
{
    private $_configs;

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

    public function store(Request $request){
        $data = [];

        $sessionCode = \PagSeguro\Services\Session::create(
            $this->getCredential()
        );
        $sessionID = $sessionCode->getResult();
        $data['sessionID'] = $sessionID;

        $data['cart'] = session('cart');

        return view('payment',$data);
    }
}
