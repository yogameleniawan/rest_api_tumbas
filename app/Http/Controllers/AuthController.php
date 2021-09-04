<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function showFormLogin()
    {
        $user = User::all();
        dd($user);
        return view('login');
    }


    public function register(Request $request)
    {
        $table = new User();
        // $table->id = Str::random(16) . Carbon::now()->format('YmdHis');
        $table->password = Hash::make($request->password);
        $table->email = $request->email;
        $table->name = $request->name;
        $table->role = $request->role;
        if ($table->save()) {
            return response()->json([
                'success'   => false,
            ], 400);
        }
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];

        $messages = [
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', '=', $email)->get();
        $credentials = $request->only('email', 'password');
        if (sizeof($user) > 0) {
            if (Auth::attempt($credentials)) {
                // login success
                Log::info(Auth::user());
                Log::info(Auth::user()->id);
                // Save user employee_name and role_id
                $employee = DB::table('users')->where('id', Auth::user()->id)->first();
                Session::put('role', $employee->role);
                return redirect()->route('welcome');
            } else {
                // login fail
                Session::flash('error', 'Username atau password salah');
                return redirect()->route('login');
            }
        } else {
            Session::flash('error', 'Username atau password salah');
            return redirect()->route('login');
        }
    }
}
