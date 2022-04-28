<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{
    public function index()
    {
      return response(["message"=>"hello"]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'username' => [],
            'email' => 'required|email|unique:users',
            'mobile_number' => 'required',
            'role' => 'required',
            'password' => 'required|min:5',

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        //creates user
        $userCreate = User::create(array_merge($validator->validated(), [
            'password' => Hash::make($request->password),
        ]));

        if ($userCreate) {
            $userCreate->id;
        }
    }

    public function get_one($id)
    {

    }

    public function update($id)
    {}

    public function delete($id)
    {}
}
