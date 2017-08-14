
@extends('admin.layouts.dashboard')
@section('section')
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
@section('page_heading','Product Listing')
@section('create_url')
   <a href="{{url('admin/addproduct')}}"> <i class="fa fa-plus" aria-hidden="true"></i>Add</a>
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
                    @slot('panelTitle', 'Product List')
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
                            @foreach($products as $product)

                                <tr class="success">
                                    <td>{{ $product->name }}</td>
                                    <td>{{$product->description}}</td>
                                     <td> <a href="{{ route('product.edit', $product->id) }}" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                         <a href="{{ route('product.delete', $product->id) }}" class="btn btn-primary"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
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
