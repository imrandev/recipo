<?php

namespace App\Http\Controllers\Operations;
use Illuminate\Http\Request;

interface ICrudOperation
{
    public function post(Request $request);
    public function update(Request $request);
    public function delete($id);
    public function search(Request $request);
}
