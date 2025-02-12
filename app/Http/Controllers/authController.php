<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\Subcriteria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function login (){
        return view('auth.login');
    }

    public function loginProcess (Request $request){
        $input = $request->all();
        $this->validate($request,[
            'email'     =>  'required',
            'password'  =>  'required'
        ],[
            'required'  =>  ':attribute tidak boleh kosong'
        ]);
        $masuk = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if($masuk){
            return redirect()->route('admin.dashboard')->withSuccess('Welcome, '.Auth::user()->name);
        }else{
            return redirect()->route('login')->withErrors('Login gagal');
        }
    }

    public function dashboard (){
        $countAlternative = Alternative::count();
        $countCriteria = Criteria::count();
        $countSubcriteria = Subcriteria::count();
        return view('admin.dashboard',compact('countAlternative','countCriteria','countSubcriteria'));
    }

    public function logout (Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view('welcome');
    }

    public function updateBiodata (Request $request,$id){
        $this->validate($request,[
            'name'  =>  'required',
            'email' =>  'required|email'
        ]);
        $user = User::findOrFail($id);
        $update = $user->update([
            'name'  =>  $request->name,
            'email' =>  $request->email
        ]);
        return $update ? back()->withSuccess('Biodata has been updated') : back()->withErrors('Biodata failed to update!');
    }
}
