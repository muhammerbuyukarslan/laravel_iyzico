<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserConstroller extends Controller
{
    public function __construct()
    {
        $this->returnUrl = "/users";
    }

    /**
     * Display a listing of the resource.
     *
     * @return Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::all();
        return view("backend.users.index",["users"=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.users.insert_form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        $data =$this->prepare($request,$user->getFillable());
        $user ->fill($data);
        $user->save();

        return Redirect::to($this->returnUrl);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(User $user)
    {
        return view("backend.users.update_form", ["user"=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $data =$this->prepare($request,$user->getFillable());
        $user ->fill($data);
        $user->is_admin=array_key_exists("is_admin",$data)? $data["is_admin"] : 0;
        $user->is_active=array_key_exists("is_active",$data)? $data["is_active"] : 0;
        $user->save();

        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        //return Redirect::to("/users");
        return response()->json(["message"=>"Done" , "id"=>$user->user_id]);
    }

    /**
     * Show the form for changing password.
     *
     * @return \Illuminate\Http\Response
     */
    public function passwordForm(User $user){

        return view("backend.users.password_form",["user"=>$user]);
    }
    public function changePassword(User $user,UserRequest $request)
    {
        $data =$this->prepare($request,$user->getFillable());
        $user ->fill($data);
        $user->save();
        return Redirect::to($this->returnUrl);
    }
}
