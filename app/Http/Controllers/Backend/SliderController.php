<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use App\Http\Controllers\Controller;


class SliderController extends Controller
{

    protected $view_path = 'backend.slider';
    protected $base_route = 'backend.sliders';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['rows'] = Slider::all();
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
    public function store(SliderRequest $req)
    {
        if ($req->hasFile('image'))
       {
           $image = $req->file('image');
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/sliders', $image_name);
           $req->request->add(['slider_image' => $image_name]);
       }

        Slider::create([
            'title' => $req->title,
            'slider_image' => $req->slider_image,
            'status' => $req->status,
        ]);
        return redirect()->route($this->base_route.'.index')->with('message','slider added successfully');
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
        $data['row'] = Slider::find($id);
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
    public function update(SliderRequest $req, $id)
    {
        $slider = Slider::find($id);
        if ($req->hasFile('image'))
       {
           $image = $req->file('image');
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/sliders', $image_name);
           $req->request->add(['slider_image' => $image_name]);
           if($slider->image){
            if(file_exists(public_path().'/images/sliders/'.$slider->slider_image)){
                
           unlink(public_path().'/images/sliders/'.$slider->slider_image);
            }
           }
       }
        $slider->update([
            'title' => $req->title,
            'slider_image' => $req->has('image')?$req->slider_image:$slider->slider_image,
            'status' => $req->status,
        ]);
        $req->session()->flash('message', 'slider updated successfully');
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
        Slider::find($id)->delete();
        return redirect()->route($this->base_route.'.index')->with('message','slider deleted successfully');
    }
}
