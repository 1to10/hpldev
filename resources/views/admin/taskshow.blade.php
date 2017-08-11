
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
                        @foreach($tasks as $task)
                            <h3>{{ $task->title }}</h3>
                            <p>{{ $task->description}}</p>
                            <p>
                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info">View Task</a>
                                <a href="{{ route('tasks.update', $task->id) }}" class="btn btn-primary">Edit Task</a>
                            </p>
                            <hr>
                        @endforeach
                    @endslot
                @endcomponent
            </div>
            <!-- /.col-sm-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.col-sm-12 -->

@endsection
