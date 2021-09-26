<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\GalleryRequest;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Album;
use App\Http\Controllers\Controller;


class GalleryController extends Controller
{

    protected $view_path = 'backend.album';
    protected $base_route = 'backend.albums';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['rows'] = Album::all();
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
    public function store(GalleryRequest $req)
    {
        if ($req->hasFile('album_cover'))
       {
           $image = $req->file('album_cover');
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/albums', $image_name);
           $req->request->add(['cover_image' => $image_name]);
       }
        $album = Album::create([
            'title' => $req->title,
            'cover_image' => $req->cover_image,
            'status' => $req->status,
        ]);


        if ($req->hasFile('images'))
       {
        foreach ($req->images as $image) {
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/galleries', $image_name);

           Gallery::create([
            'album_id' => $album->id,
            'image' => $image_name,
            'status' => $req->status,
           ]);
        }
       }
        return redirect()->route($this->base_route.'.index')->with('message','Album created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::find($id);
        return view($this->view_path.'.show', compact('album',$album));

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
        $data['row'] = Album::find($id);
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
    public function update(GalleryRequest $req, $id)
    {
        $album = Album::find($id);
        if ($req->hasFile('album_cover'))
       {
           $image = $req->file('album_cover');
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/albums', $image_name);
           $req->request->add(['cover_image' => $image_name]);
           if($album->cover_image){
            if(file_exists(public_path().'/images/albums/'.$album->cover_image)){
                
           unlink(public_path().'/images/albums/'.$album->cover_image);
            }
           }
       }
        $album->update([
            'title' => $req->title,
            'cover_image' => $req->has('cover_image')?$req->cover_image:$album->cover_image,
            'status' => $req->status,
        ]);

        if ($req->hasFile('images'))
       {
        foreach ($req->images as $image) {
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/galleries', $image_name);

           Gallery::create([
            'album_id' => $id,
            'image' => $image_name,
            'status' => $req->status,
           ]);
        }
       }

        $req->session()->flash('message', 'Album updated successfully');
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
        $albumdel = Album::find($id);
        if(file_exists(public_path().'/images/albums/'.$albumdel->cover_image)){
                
           unlink(public_path().'/images/albums/'.$albumdel->cover_image);
        }
        $albumdel->delete();

        $galleries = Gallery::where([['album_id',$id]])->get();

        if($albumdel){
            foreach($galleries as $gallery){
                if(file_exists(public_path().'/images/galleries/'.$gallery->image)){
                
                  unlink(public_path().'/images/galleries/'.$gallery->image);
                }
                $gallery->delete();
            }
        }
        return redirect()->route($this->base_route.'.index')->with('message','Album deleted successfully');
    }


    public function delGalleryImg(Request $req){
        $img = Gallery::find($req->id);

            if(file_exists(public_path().'/images/galleries/'.$img->image)){
                
           unlink(public_path().'/images/galleries/'.$img->image);
            }

        $img->delete();
    }
}
