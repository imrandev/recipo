<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Base\LogicController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserController extends LogicController {

    public function index(){
        if(Auth::check()){
            $user = Auth::user();
            $activeUserName = $user->name;
            $users = User::all();
            if (Session::get('users') != null){
                dump(Session::get('users'));
                dump($users);
                $users = Session::get('users');
            }
            return view('users.index')->with(compact('users', 'activeUserName'));
        }
        return Redirect::to("/login");
    }

    public function post(Request $request): \Illuminate\Http\RedirectResponse
    {

        if (!Auth::check()){
            return Redirect::to("/login");
        }

        $userId = $request->input('id');

        if ($userId != null){

            request()->validate([
                'password' => 'required|min:6',
            ]);

            $id = $request->input('id');

            //update user
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->type = $request->input('type');
            $user->save();

        } else {
            request()->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'type' => 'required'
            ]);

            $data = $request->all();

            $check = $this->create($data);
        }
        return Redirect::back();
    }

    public function create(array $data){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'active' => true,
            'type' => $data['type']
        ]);
    }

    public function delete($id): \Illuminate\Http\RedirectResponse
    {
        if(Auth::check()){
            User::where('id', $id)->delete();
            return Redirect::back();
        }
        return Redirect::to("/login");
    }

    public function getCount(){
        if(Auth::check()){
            $user = Auth::user();
            $count = ($user->type == 'ADMIN') ? User::all()->count() : User::where('id', $user->id)->count();
            return view('dashboard.index')->with('userCount', $count);
        }
        return Redirect::to("/login");
    }

    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        if (!Auth::check()){
            return Redirect::to("/login");
        }

        request()->validate([
            'password' => 'required|min:6',
        ]);

        $id = $request->input('id');
        //update user
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->type = $request->input('type');
        $user->save();
        return Redirect::back();
    }

    public function search(Request $request): \Illuminate\Http\RedirectResponse
    {
        $query = $request->input('query');
        if (empty($query)){
            redirect()->back();
        }
        $users = DB::table("users")
            ->where(DB::raw("LOWER(users.name)"), "like", '%'.strtolower($query).'%')
            ->orWhere(DB::raw("LOWER(users.type)"), "=", strtolower($query))
            ->select("users.*")
            ->get();
        return redirect()->back()->with('users', $users);
    }
}
