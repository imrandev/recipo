<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index(){
        if(Auth::check()){
            $recipes = Recipe::all();
            return view('recipe.index')->with('recipes', $recipes);
        }
        return Redirect::to("/login");
    }

    public function postRecipe(Request $request): \Illuminate\Http\RedirectResponse
    {
        if (!Auth::check()){
            return Redirect::to("/login");
        }

        request()->validate([
            'title' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
            'cookTime' => 'required',
            'source' => 'required',
        ]);

        if($request->hasFile('imgSrc')){
            if ($request->file('imgSrc')->isValid()) {
                $data = $request->all();
                $fileName = date('mdYHis') . uniqid() . $request->file('imgSrc')->getClientOriginalName();
                $path = base_path() . '/public/www_data/';
                $request->file('imgSrc')->move($path, $fileName);
                $data['imgSrc'] = $path.$fileName;

                $private = $request->has('private');

                $check = $this->create($data, $private);

                return redirect()->back();
            }
            return redirect()->back()->with('errorLabelImgSrc', 'File not valid');
        }
        return Redirect::back();
    }

    public function create(array $data, bool $private){

        $user = Auth::user();

        return Recipe::create([
            'title' => $data['title'],
            'ingredients' => $data['ingredients'],
            'instructions' => $data['instructions'],
            'cook_time' => $data['cookTime'],
            'cook_time_type' => $data['cookTimeType'],
            'source' => $data['source'],
            'img_src' => $data['imgSrc'],
            'is_private' => $private,
            'user_id' => $user->id
        ]);
    }

    public function deleteRecipe($id){
        if(Auth::check()){
            Recipe::where('id', $id)->delete();
            $user = Auth::user();
            $recipes = Recipe::all();
            return view('recipe.index')->with('recipes', $recipes);
        }
        return Redirect::to("/login");
    }
}
