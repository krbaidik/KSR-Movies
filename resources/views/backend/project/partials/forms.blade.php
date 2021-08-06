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
        {{Form::label('project_image', 'Project Image *')}}
        {{Form::file('project_image', null,['class' => 'form-control'])}}       
            @if($data['row'])
            <img src="{{ asset('images/projects/'.$data['row']->image) }}" alt="" width="150">
            @endif
      </div>

      <div class="form-group cbox">
        {{Form::checkbox('upcoming_project',1, isset($data['row']->upcoming_project) ? true : false, ['class' => 'check'])}} <span> Check the box, if this is the UPCOMING PROJECT.</span><br>
      </div>

      <div class="form-group">
        {{Form::label('status', 'Status')}}
        {{Form::radio('status', 1, true)}} Active
        {{Form::radio('status', 0, false)}} DeActive
      </div>
</div>