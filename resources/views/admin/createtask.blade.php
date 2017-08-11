
@extends('admin.layouts.dashboard')

@section('page_heading','Create Task')

@section('section')
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                @component('admin.widgets.panel')
                    @slot('panelTitle', 'Create Task')
                    @slot('panelBody')
                        {!! Form::open([
    'url' => 'storetask'
]) !!}

                        <div class="form-group">
                            {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        </div>

                            <textarea id="my-editor" name="content" class="form-control">{!! old('content', 'test editor content') !!}</textarea>
                            <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                            <script>
                                var options = {
                                    filebrowserImageBrowseUrl: '{{url("/laravel-filemanager?type=Images")}}',
                                    filebrowserImageUploadUrl: '{{url("/laravel-filemanager/upload?type=Images&_token=")}}',
                                    filebrowserBrowseUrl: '{{url("/laravel-filemanager?type=Files")}}',
                                    filebrowserUploadUrl: '{{url("/laravel-filemanager/upload?type=Files&_token=")}}'
                                };
                            </script>


                            <div class="input-group">
   <span class="input-group-btn">
     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
       <i class="fa fa-picture-o"></i> Choose
     </a>
   </span>
                                <input id="thumbnail" class="form-control" type="text" name="filepath">
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;">
                        <div class="input-group">
   <span class="input-group-btn">
     <a id="lfm2" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary">
       <i class="fa fa-picture-o"></i> Choose
     </a>
   </span>
                            <input id="thumbnail1" class="form-control" type="text" name="filepath1">
                        </div>
                        <img id="holder1" style="margin-top:15px;max-height:100px;">


                        {!! Form::submit('Create New Task', ['class' => 'btn btn-primary']) !!}

                        {!! Form::close() !!}
                    @endslot
                @endcomponent
            </div>
            <!-- /.col-sm-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.col-sm-12 -->

@endsection
