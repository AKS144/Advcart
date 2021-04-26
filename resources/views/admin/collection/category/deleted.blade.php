@extends('layouts.admin')
@section('content')

    <div class="container-fluid mt-5">
        <!-- Heading -->
        <div class="card mb-4 wow fadeIn">
          <!--Card content-->
          <div class="card-body d-sm-flex justify-content-between">
            <h4 class="mb-2 mb-sm-0 pt-1">
              Collection|Category Deleted
            </h4>

          </div>
        </div>
        <!-- Heading -->

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
                                <a href="{{url('category-re-store/'.$item->id)}}" class="badge py-2 px-2 btn-danger">Re-store</a>
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
