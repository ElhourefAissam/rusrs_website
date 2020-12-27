<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return view('home');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = array(
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        );
        if (\Auth::attempt($user)) {

            \Auth::loginUsingId(1);
            return response()->json(
                ['status' => 'done'],
                200
            );
        } else {
            return response()->json(['status' => 'failed'], 422);
        }
    }

    public function logout()
    {
        \Auth::logout();
        return response()->json(
            ['status' => 'done'],
            200
        );
    }
}
