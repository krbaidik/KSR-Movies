<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\TeamRequest;
use App\Models\Team;
use App\Http\Controllers\Controller;


class TeamController extends Controller
{

    protected $view_path = 'backend.team';
    protected $base_route = 'backend.teams';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['rows'] = Team::all();
        return view($this->view_path.'.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['row'] = null;
        return view($this->view_path.'.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $req)
    {
        if ($req->hasFile('team_image'))
       {
           $image = $req->file('team_image');
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/teams', $image_name);
           $req->request->add(['image' => $image_name]);
       }
        Team::create([
            'name' => $req->name,
            'position' => $req->position,
            'description' => $req->description,
            'image' => $req->image,
            'twitter_url' => $req->twitter_url,
            'facebook_url' => $req->facebook_url,
            'instagram_url' => $req->instagram_url,
            'youtube_url' => $req->youtube_url,
            'status' => $req->status,
        ]);
        return redirect()->route($this->base_route.'.index')->with('message','team added successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);


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
        $data['row'] = Team::find($id);
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
    public function update(TeamRequest $req, $id)
    {
        $team = Team::find($id);
        if ($req->hasFile('team_image'))
       {
           $image = $req->file('team_image');
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/teams', $image_name);
           $req->request->add(['image' => $image_name]);
           if($team->image){
            if(file_exists(public_path().'/images/teams/'.$team->image)){
                
           unlink(public_path().'/images/teams/'.$team->image);
            }
           }
       }
        $team->update([
            'name' => $req->name,
            'position' => $req->position,
            'description' => $req->description,
            'image' => $req->has('team_image')?$req->image:$team->image,
            'twitter_url' => $req->twitter_url,
            'facebook_url' => $req->facebook_url,
            'instagram_url' => $req->instagram_url,
            'youtube_url' => $req->youtube_url,
            'status' => $req->status,
        ]);
        $req->session()->flash('message', 'team updated successfully');
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
        $team = Team::find($id);

        if(file_exists(public_path().'/images/teams/'.$team->image)){
                
           unlink(public_path().'/images/teams/'.$team->image);
        }

        $team->delete();
        return redirect()->route($this->base_route.'.index')->with('message','team deleted successfully');
    }
}
