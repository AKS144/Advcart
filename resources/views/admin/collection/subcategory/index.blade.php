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
              <a href="#">Collections|Sub-category</a>
              <a href="{{ url('/sub-category-view') }}" class="badge btn btn-primary p-2 text-white float-right ml-2">Add</a>
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
                    <th>Group Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Show|Hide</th>
                    <th>Action</th>
                </thead>
                @foreach($subcategory as $item)
                <tbody>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name}}</td>
                    <td>{{ $item->category->name}}</td><!--group is function used in belongsto-->
                    <td>{{ $item->description}}</td>
                    <td>
                        <img src="{{asset('uploads/subcategoryimage/'.$item->image)}}" width="50px" alt=""/>
                    </td>
                    <td>
                        <input type="checkbox" {{ $item->status == '1' ? 'checked':''}}>
                    </td>
                    <td>
                        <a href="{{url('sub-category-edit/'.$item->id)}}" class="badge btn-primary">Edit</a>
                        <a href="{{url('sub-category-delete/'.$item->id)}}" class="badge badge-danger">Delete</a>
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

