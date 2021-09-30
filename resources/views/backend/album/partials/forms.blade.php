<div class="box-body">
     <div class="form-group">
        {{Form::label('title', 'Album Title *')}}
        {{Form::text('title', null,['class' => 'form-control','placeholder' => 'Enter Album Title'])}}
      </div>

      <div class="form-group">
        {{Form::label('album_cover', 'Cover Image *')}}
        {{Form::file('album_cover', null,['class' => 'form-control'])}}       
            @if($data['row'])
            <img src="{{ asset('images/albums/'.$data['row']->cover_image) }}" alt="" width="150" style="margin-top: 5px;">
            @endif
      </div>

      <div class="form-group">   
        {{Form::label('image', 'Gallery Images *')}}  
        <div>
            <div class="row">
                @if($data['row'])
            @foreach($data['row']->galleries as $gallery)
                <div class="col-md-3 imagediv">
                    <span class="del_btn delImg" title="Delete Image" id="{{ $gallery->id}}"><i class="fa fa-trash" ></i></span>
                    <a href="{{ asset('images/galleries/'.$gallery->image)}}" target="_blank"><img src="{{ asset('images/galleries/'.$gallery->image)}}" alt="{{ $gallery->image}}" width="210" height="150" style="margin-bottom: 10px;"></a>
                </div>
            @endforeach
            @endif
            </div>
        </div>
      <div class="input-images"></div>
            @if($data['row'])
            <img src="{{ asset('images/galleries/'.$data['row']->image) }}" alt="" width="150">
            @endif
      </div>

      <div class="form-group">
        {{Form::label('status', 'Status')}}
        {{Form::radio('status', 1, true)}} Active
        {{Form::radio('status', 0, false)}} DeActive
      </div>
</div>