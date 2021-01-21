<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ConfirmPasswordRequest;
use App\Models\Admin;
use Hash;
use Auth;
use DB;

class ResetPasswordController extends Controller
{
    private $model,$view,$guard,$url;

	public function __construct()
    {
		$this->middleware(function ($request, $next) {
            switch (\Request::route()->getPrefix()) {
                case "/admin":
                    $this->model = app('App\Models\Admin');
                    $this->view = 'admin.page-confirm-password';
                    $this->guard = 'admin';
                    $this->url = 'admin';
                    break;
                default:
                    $this->model = app('App\Models\Usuario');
                    $this->view = 'frontend.confirm-password';
                    $this->guard = 'web';
                    $this->url = 'home';
                    break;
            }
            return $next($request);
		});
    }

    public function index($token)
    {
        $tokenData = DB::table('password_resets')->where('token', $token)->first();
        if ( !$tokenData ) return redirect()->to('home');
        return view($this->view,compact('tokenData'));
    }

    public function store(ConfirmPasswordRequest $request, $token)
    {
        $password = $request->password;
        $tokenData = DB::table('password_resets')->where('token', $token)->first();
        $user = $this->model::where('email', $tokenData->email)->first();
        if ( !$user ) return redirect()->to('home');

        $user->password = Hash::make($password);
        $user->update();

        Auth::guard($this->guard)->login($user);

        DB::table('password_resets')->where('email', $user->email)->delete();
        return redirect()->route($this->url);
    }
}
