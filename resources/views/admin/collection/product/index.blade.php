@extends('layouts.admin')
@section('content')

<div class="container-fluid mt-5">
<div class="row">
    <div class="col-md-12">
        <!-- Heading -->
        <div class="card mb-4 wow fadeIn">
          <!--Card content-->
          <div class="card-body d-sm-flex justify-content-between">
            <h4 class="mb-2 mb-sm-0 pt-1">
                Collections|Products
              <a href="{{ url('')}}" class="badge btn btn-primary p-2 text-white float-right ml-2">Deleted</a>
              <a href="{{ url('/add-products') }}" class="badge btn btn-primary p-2 text-white float-right ml-2">Add</a>
            </h4>
          </div>
        </div>
        <!-- Heading -->
    </div>
</div>


<div class="row mt-3">
    <div class="col-md-12">

      <div class="card">
          <div class="card-body">
            @if(session('status'))
            <h5>{{session('status')}}</h5>
            @endif
            <table class="table table-stripped table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Sub Category Name</th>
                    <th>Image</th>
                    <th>Show|Hide</th>
                    <th>Action</th>
                </thead>
                @foreach($products as $item)
                <tbody>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name}}</td>
                    <td>{{ $item->subcategory->name}}</td><!--group is function used in belongsto-->
                    <td>
                        <img src="{{asset('uploads/products/'.$item->image)}}" width="50px" alt="Product Image"/>
                    </td>
                    <td>
                        <input type="checkbox" {{$item->status == '1' ? 'checked':''}}>
                    </td>
                    <td>
                        <a href="{{url('edit-products/'.$item->id)}}" class="badge btn-primary">Edit</a>
                        <a href="{{url('delete-products/'.$item->id)}}" class="badge badge-danger">Delete</a>
                    </td>
                </tbody>
                @endforeach
            </table>
          </div>
      </div>
    </div>
</div>
</div>

@endsection

