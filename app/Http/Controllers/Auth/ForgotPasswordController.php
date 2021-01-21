<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use DB;
use Auth;
use Hash;
use Carbon\Carbon;
use App\Models\Admin;
use App\Mail\ResetPassword;
use App\Http\Requests\ForgotPasswordRequest;

class ForgotPasswordController extends Controller
{
    private $model,$view,$query,$url;

	public function __construct()
    {
		$this->middleware(function ($request, $next) {
            switch (\Request::route()->getPrefix()) {
                case "/admin":
                    $this->model = app('App\Models\Admin');
                    $this->view = 'admin.page-forget';
                    $this->query = $this->model::where('email',$request->email)->first();
                    $this->url = 'admin.reset.password';
                    break;
                default:
                    $this->model = app('App\Models\Usuario');
                    $this->view = 'frontend.forget-password';
                    $this->query = $this->model::where('login',preg_replace("/[^0-9]/","",$request->login))->first();
                    $this->url = 'reset.password';
                    break;
            }
            return $next($request);
		});
	}

    public function index(){
        return view($this->view);
    }

    public function store(ForgotPasswordRequest $request){
        $user = $this->query;
        if ( !$user ) return redirect()->back()->withErrors(['error' => 'Email não localizado']);

        DB::table('password_resets')->insert([
            'email' => $user->email,
            'token' => Str::random(60),
            'created_at' => Carbon::now()
        ]);

        $tokenData = DB::table('password_resets')->where('email', $user->email)->first();

        $name = $user->nome;
        $email = $user->email;

        try {
            Mail::to($email)->send(new ResetPassword(route($this->url,$tokenData->token),$name));
        } catch (\Throwable $th) {
            //throw $th;
        }

        return redirect()->back()->with(['message'=>'Email enviado com sucesso','class'=>'success']);
    }
}
