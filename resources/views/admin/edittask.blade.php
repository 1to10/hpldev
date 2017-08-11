
@extends('admin.layouts.dashboard')

@section('page_heading','Edit Task')

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
                    @slot('panelTitle', 'Edit Task')
                    @slot('panelBody')
                        <h1>Editing "{{ $task->title }}"</h1>
                        <p class="lead">Edit and save this task below, or <a href="">go back to all tasks.</a></p>
                        <hr>



                        @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif

                        {!! Form::model($task, [
                            'method' => 'POST',
                            'route' => ['tasks.updates', $task->id]
                        ]) !!}

                        <div class="form-group">
                            {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Update Task', ['class' => 'btn btn-primary']) !!}

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
