<div class="box-body">
     <div class="form-group">
        {{Form::label('title', 'Title *')}}
        {{Form::text('title', null,['class' => 'form-control','placeholder' => 'Enter title'])}}
      </div>

      <div class="form-group">
        {{Form::label('image', 'Image *')}}
        {{Form::file('image', null,['class' => 'form-control'])}}       
            @if($data['row'])
            <img src="{{ asset('images/sliders/'.$data['row']->slider_image) }}" alt="" width="150">
            @endif
      </div>

      <div class="form-group">
        {{Form::label('status', 'Status')}}
        {{Form::radio('status', 1, true)}} Active
        {{Form::radio('status', 0, false)}} DeActive
      </div>
</div>