<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\LogicController;
use App\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class IngredientController extends LogicController
{

    public function index()
    {
        if(Auth::check()){
            $ingredients = Ingredient::all();
            return view('ingredient.index')->with('ingredients', $ingredients);
        }
        return Redirect::to("/login");
    }

    public function post(Request $request)
    {
        if (!Auth::check()){
            return Redirect::to("/login");
        }

        request()->validate([
            'name' => 'required',
            'amount' => 'required',
            'unit' => 'required'
        ]);

        $data = $request->all();
        $check = $this->create($data);
        return redirect()->back();
    }

    public function create(array $data){
        $user = Auth::user();
        return Ingredient::create([
            'name' => $data['name'],
            'amount' => $data['amount'],
            'unit' => $data['unit'],
            'user_id' => $user->id
        ]);
    }

    public function update(Request $request)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        if(Auth::check()){
            Ingredient::where('id', $id)->delete();
            $user = Auth::user();
            $ingredients = Ingredient::all();
            return view('ingredient.index')->with('ingredients', $ingredients);
        }
        return Redirect::to("/login");
    }

    public function search(Request $request)
    {
        // TODO: Implement search() method.
    }
}
