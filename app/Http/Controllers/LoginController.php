<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;


class LoginController extends Controller
{
    function index(){
      
        return view("login/index");
    }
    function login(Request $request){
        $request->validate([
        'email'=>'required',
        'password'=>'required'
        ] ,[
            'email'=>'Email wajib diisi',
            'password'=>'Pasword wajib diisi',
        ]);
        $infologin=[
            'email'=>$request->email,
            'password'=>$request->password
        ];
        if(Auth::attempt($infologin)) {
            return redirect('gapress')->with('success','Berhasil login');
        }else{
        return redirect('login')->withErrors('Username dan Password salah');
        }
    }
    function logout(){
    Auth::logout();
    return redirect('/')->withErrors('success','Berhasil Logout');
    }
    function register() {
        return view('login/register');
    }
    function create (Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6'
            ] ,[
                'name'=>'Name wajib diisi',
                'email'=>'Email wajib diisi',
                'email.email'=>'Silahkan masukan email dengan benar',
                'email.unique' => 'Email sudah digunakan, silakan masukkan email yang lain',
                'password'=>'Pasword wajib diisi',
                'password.min'=>'Pasword harus lebih dari 6',
            ]);

            
    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ];
    User::create($data);


            $infologin=[
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password
            ];
            if(Auth::attempt($infologin)) {
                return redirect('gapress')->with('success','Berhasil login');
            }else{
            return redirect('login')->withErrors('Username dan Password salah');
            }
    }
}