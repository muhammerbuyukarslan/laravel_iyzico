<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->returnUrl = "/users/{}/addresses";
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(User $user) : \Illuminate\Contracts\View\View
    {
        $addrs = $user->addrs;
        return view("backend.addresses.index",["addrs"=>$addrs,"user"=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return
     */
    public function create(User $user)
    {
        return view("backend.addresses.insert_form",["user"=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(User $user , AddressRequest $request): RedirectResponse
    {
        $addr = new Address();
        $data =$this->prepare($request,$addr->getFillable());
        $addr ->fill($data);
        $addr->save();

        $this->editReturn($user->user_id);

        return Redirect::to($this->returnUrl);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return
     */
    public function edit(User $user , Address $address)
    {
        return view("backend.addresses.update_form", ["user"=>$user,"addr"=>$address]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return RedirectResponse|\Illuminate\Http\Response
     */
    public function update(AddressRequest $request,User $user , Address $address)
    {
        $data =$this->prepare($request,$address->getFillable());
        $address ->fill($data);
        $address->save();

        $this->editReturn($user->user_id);

        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy(User $user,Address $address)
    {
        $address->delete();
        return response()->json(["message"=>"Done" , "id"=>$address->address_id]);
    }
    private function editReturn($id){
        $this->returnUrl = "/users/$id/addresses";
    }
}
