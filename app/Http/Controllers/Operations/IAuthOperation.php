<?php


namespace App\Http\Controllers\Operations;

use Illuminate\Http\Request;

interface IAuthOperation extends IAuthViewOperation
{
    public function login(Request $request);
    public function signUp(Request $request);
    public function logout();
}
