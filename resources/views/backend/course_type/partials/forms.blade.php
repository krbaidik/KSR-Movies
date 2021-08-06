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
        {{Form::label('short_description', 'Short description *')}}
        {{Form::textarea('short_description', null,['class' => 'form-control','placeholder' => 'Enter short description'])}}
      </div>

      <div class="form-group">
        {{Form::label('status', 'Status')}}
        {{Form::radio('status', 1, true)}} Active
        {{Form::radio('status', 0, false)}} DeActive
      </div>
</div>