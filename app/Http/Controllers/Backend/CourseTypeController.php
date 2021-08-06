<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CourseTypeRequest;
use App\Models\CourseType;
use App\Http\Controllers\Controller;


class CourseTypeController extends Controller
{

    protected $view_path = 'backend.course_type';
    protected $base_route = 'backend.course_type';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['rows'] = CourseType::all();
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
    public function store(CourseTypeRequest $req)
    {
        CourseType::create([
            'title' => $req->title,
            'slug' => $req->slug,
            'short_description' => $req->short_description,
            'status' => $req->status
        ]);
        return redirect()->route($this->base_route.'.index')->with('message','CourseType added successfully');
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
        $data['row'] = CourseType::find($id);
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
    public function update(CourseTypeRequest $request, $id)
    {
        $service = CourseType::find($id);
        $service->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'short_description' => $request->short_description,
            'status' => $request->status,
        ]);
        $request->session()->flash('message', 'CourseType updated successfully');
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
        CourseType::find($id)->delete();
        return redirect()->route($this->base_route.'.index')->with('message','CourseType deleted successfully');
    }
}
