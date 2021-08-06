<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Page\PageCreateValidation;
use App\Models\Video;
use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;


class VideoController extends Controller
{

    protected $view_path = 'backend.video';
    protected $base_route = 'backend.videos';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['rows'] = Video::all();
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
    public function store(VideoRequest $req)
    {
        Video::create([
            'title' => $req->title,
            'video_link' => $req->video_link,
            'status' => $req->status
        ]);
        return redirect()->route($this->base_route.'.index')->with('message','video added successfully');
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
        $data['row'] = Video::find($id);
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
    public function update(VideoRequest $request, $id)
    {
        $video = Video::find($id);
        $video->update([
            'title' => $request->title,
            'video_link' => $request->video_link,
            'status' => $request->status,
        ]);
        $request->session()->flash('message', 'video updated successfully');
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
        Video::find($id)->delete();
        return redirect()->route($this->base_route.'.index')->with('message','video deleted successfully');
    }
}
