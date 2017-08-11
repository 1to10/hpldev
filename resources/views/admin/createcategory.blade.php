@extends('admin.layouts.dashboard')

@section('page_heading',(isset($categoryByid))?'Update Category':'Add Category')

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
                    @slot('panelTitle', (isset($categoryByid))?'Update Category':'Add Category')
                    @slot('panelBody')
                          @if(isset($categoryByid))
                            {!! Form::model($categoryByid, [
                          'method' => 'POST',
                          'route' => ['category.update', $categoryByid->id]
                      ]) !!}
                        @else
                        {!! Form::open(['url' => 'storeCategory']) !!}
                        @endif

                        <div class="form-group">
                            {!! Form::hidden('type', '1', ['class' => 'form-control']) !!}
                            {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
                            {!! Form::text('name', (isset($categoryByid->name))?$categoryByid->name:'', ['class' => 'form-control']) !!}
                        </div>

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}--}}
                            {{--{!! Form::textarea('description', null, ['class' => 'form-control']) !!}--}}
                        {{--</div>--}}
                        <div class="form-group">
                            {!! Form::label('short_description', 'Short Description:', ['class' => 'control-label']) !!}
                        <textarea id="my-editor-short" name="short_description" class="form-control">{!! old('short_description', (isset($categoryByid->short_description))?$categoryByid->short_description:'test editor content') !!}</textarea>
                        <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                        <script>
                            var options = {
                                filebrowserImageBrowseUrl: '{{url("/laravel-filemanager?type=Images")}}',
                                filebrowserImageUploadUrl: '{{url("/laravel-filemanager/upload?type=Images&_token=")}}',
                                filebrowserBrowseUrl: '{{url("/laravel-filemanager?type=Files")}}',
                                filebrowserUploadUrl: '{{url("/laravel-filemanager/upload?type=Files&_token=")}}'
                            };
                        </script>
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
                            <textarea id="my-editor" name="description" class="form-control">{!! old('description', (isset($categoryByid->description))?$categoryByid->description:'test editor content') !!}</textarea>
                            <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                            <script>
                                var options = {
                                    filebrowserImageBrowseUrl: '{{url("/laravel-filemanager?type=Images")}}',
                                    filebrowserImageUploadUrl: '{{url("/laravel-filemanager/upload?type=Images&_token=")}}',
                                    filebrowserBrowseUrl: '{{url("/laravel-filemanager?type=Files")}}',
                                    filebrowserUploadUrl: '{{url("/laravel-filemanager/upload?type=Files&_token=")}}'
                                };
                            </script>
                        </div>
                        <div class="form-group">
                            {!! Form::label('thumbnail', 'Thumbnail:', ['class' => 'control-label']) !!}
                        <div class="input-group">
                            <span class="input-group-btn">
                           <a data-input="thumbnail" data-preview="holder" class="btn btn-primary lfm">
                          <i class="fa fa-picture-o"></i> Choose
                                  </a>
                                 </span>
                                <input id="thumbnail" value="{{(isset($categoryByid->thumb_image))?$categoryByid->thumb_image:''}}"class="form-control" type="text" name="thumb_image">
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;">
                        </div>
                        <div class="form-group">
                            {!! Form::label('image', 'Image:', ['class' => 'control-label']) !!}
                        <div class="input-group">
   <span class="input-group-btn">
     <a  data-input="thumbnail1" data-preview="holder2" class="btn btn-primary lfm">
       <i class="fa fa-picture-o"></i> Choose
     </a>
   </span>
                            <input id="thumbnail1"  value="{{(isset($categoryByid->image))?$categoryByid->image:''}}" class="form-control" type="text" name="image">
                        </div>
                        <img id="holder2" style="margin-top:15px;max-height:100px;">
                        </div>
                        <div class="form-group">
                            {!! Form::label('document', 'Document:', ['class' => 'control-label']) !!}
                        <div class="input-group">
   <span class="input-group-btn">
     <a data-input="document" data-preview="holder3" class="btn btn-primary lfm">
       <i class="fa fa-picture-o"></i> Choose
     </a>
   </span>
                            <input id="document" value="{{(isset($categoryByid->document))?$categoryByid->document:''}}" class="form-control" type="text" name="document">
                        </div>
                        <img id="holder3" style="margin-top:15px;max-height:100px;">
                        </div>
                        <div class="form-group">
                            <label for="sel">Status</label>
                            <select id="sel" name="status" class="form-control">
                                <option value="1" {{(isset($categoryByid->status) && $categoryByid->status=='1')?'selected':''}}>Active</option>
                                <option value="0" {{(isset($categoryByid->status) && $categoryByid->status=='0')?'selected':''}}>Inactive</option>

                            </select>
                        </div>
                        <div class="form-group">
                        {!! Form::submit((isset($categoryByid->name))?'Edit Category' :'Add Category', ['class' => 'btn btn-primary']) !!}

                        {!! Form::close() !!}
                        </div>
                    @endslot
                @endcomponent
            </div>
            <!-- /.col-sm-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.col-sm-12 -->

@endsection
