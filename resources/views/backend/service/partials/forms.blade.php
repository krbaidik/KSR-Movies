<div class="box-body">
     <div class="form-group">
        {{Form::label('title', 'Title *')}}
        {{Form::text('title', null,['class' => 'form-control','placeholder' => 'Enter title'])}}
      </div>

      <div class="form-group">
        {{Form::label('slug', 'Slug *')}}
        {{Form::text('slug', null,['class' => 'form-control','placeholder' => 'Enter slug'])}}
      </div>
      <div class="form-group">
        {{Form::label('description', 'description *')}}
        {{Form::textarea('description', null,['class' => 'form-control','placeholder' => 'Enter description'])}}
      </div>

      <div class="form-group">
        {{Form::label('service_image', 'Service Image *')}}
        {{Form::file('service_image', null,['class' => 'form-control'])}}       
            @if($data['row'])
            <img src="{{ asset('images/services/'.$data['row']->image) }}" alt="" width="150">
            @endif
      </div>

      <div class="form-group">
        {{Form::label('status', 'Status')}}
        {{Form::radio('status', 1, true)}} Active
        {{Form::radio('status', 0, false)}} DeActive
      </div>
</div>