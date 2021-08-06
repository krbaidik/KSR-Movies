<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Message;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{

    protected $view_path = 'backend.user';
    protected $base_route = 'backend.users';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['users'] = User::all();
        return view($this->view_path.'.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->view_path.'.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $req)
    {
        if ($req->hasFile('photo'))
       {
           $image = $req->file('photo');
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/users', $image_name);
           $req->request->add(['image' => $image_name]);
       }
        User::create([
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'name' => $req->name,
            'contact' => $req->contact,
            'address' => $req->address,
            'image' => $req->image,
            'status' => $req->status
        ]);
        return redirect()->route($this->base_route.'.index')->with('message','User added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = [];
        $data['users'] = User::find($id);
        return view($this->view_path.'.edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        if ($request->hasFile('photo'))
       {
           $image = $request->file('photo');
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/users', $image_name);
           $request->request->add(['image' => $image_name]);
           if($user->image){
           unlink(public_path().'/images/users/'.$user->image);
           }
       }
        $user->update([
            'email' => $request->email,
            'password' => $request->has('password')?bcrypt($request->password):$user->password,
            'image' => $request->has('image')?$request->image:$user->image,
            'name' => $request->name,
            'contact' => $request->contact,
            'address' => $request->address,
            'status' => $request->status,
        ]);
        $request->session()->flash('message', 'User updated successfully');
        return redirect()->route($this->base_route.'.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route($this->base_route.'.index')->with('message','User deleted successfully');
    }



    public function getMessages(){
        $msg = Message::latest()->get();
        return view('backend.message.index',compact('msg'));
    }

    public function delMsg($id)
    {
        Message::find($id)->delete();
        return redirect('/backend/messages')->with('message','Message deleted successfully');
    }

}
