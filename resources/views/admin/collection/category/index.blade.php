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
              <a href="#">Collections|Category</a>
              <a href="{{ url('category-deleted-records') }}" class="badge btn btn-primary p-2 text-white float-right ml-2">Deleted Catefory</a>
              <a href="{{ url('category-add') }}" class="badge btn btn-primary p-2 text-white float-right">ADD Category</a>
            </h4>
          </div>
        </div>
        <!-- Heading -->
    </div>
</div>


        <div class="row mt-3">
            <div class="col-md-12">
                @if(session('status'))
                    <h5>{{session('status')}}</h5>
                @endif
              <div class="card">
                  <div class="card-body">
                    <table class="table table-stripped table-bordered">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Group Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Icon</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        @foreach($category as $item)
                        <tbody>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name}}</td>
                            <td>{{ $item->group->name}}</td><!--group is function used in belongsto-->
                            <td>{{ $item->description}}</td>
                            <td>
                                <img src="{{asset('uploads/categoryimage/'.$item->image)}}" width="50px" alt=""/>
                            </td>
                            <td>
                                <img src="{{asset('uploads/categoryicon/'.$item->icon)}}" width="50px" alt=""/>
                            </td>
                            <td>
                                <input type="checkbox" {{ $item->status == '1' ? 'checked':''}}>
                            </td>
                            <td>
                                <a href="{{url('category-edit/'.$item->id)}}" class="badge btn-primary">Edit</a>
                                <a href="{{url('category-delete/'.$item->id)}}" class="badge badge-danger">Delete</a>
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
