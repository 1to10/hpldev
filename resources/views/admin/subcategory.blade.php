
@extends('admin.layouts.dashboard')

@section('page_heading','Sub Category')
@section('create_url')
   <a href="{{url('admin/addsubcategory')}}"> <i class="fa fa-plus" aria-hidden="true"></i>Add</a>
   {!! link_to_route('admin.payments.excel',
    'Export to Excel', null,
    ['class' => 'btn btn-info'])
!!}
    @endsection
@section('section')

    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                @component('admin.widgets.panel')
                    @slot('panelTitle', 'Sub Category List')
                    @slot('panelBody')

                        <table class="table table-bordered" id="example">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subcategory as $cat)

                                <tr class="success">
                                    <td>{{ $cat->name }}</td>
                                    <td>{{$cat->description}}</td>
                                     <td> <a href="{{ route('subcategory.edit', $cat->id) }}" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                         <a href="{{ route('subcategory.delete', $cat->id) }}" class="btn btn-primary"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>

                    @endslot
                @endcomponent
            </div>
            <!-- /.col-sm-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.col-sm-12 -->

@endsection
