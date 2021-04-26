@extends('layouts.admin')
@section('content')

    <div class="container-fluid mt-5">
        <!-- Heading -->
        <div class="card mb-4 wow fadeIn">
          <!--Card content-->
          <div class="card-body d-sm-flex justify-content-between">
            <h4 class="mb-2 mb-sm-0 pt-1">
              Collection|Group Deleted
            </h4>

          </div>
        </div>
        <!-- Heading -->

        <div class="row">
            <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                    <table class="table table-stripped table-bordered">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        @foreach($group as $item)
                        <tbody>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name}}</td>
                            <td>{{ $item->descrip}}</td>
                            <td>
                                <input type="checkbox" {{ $item->status == '1' ? 'checked':''}}>
                            </td>
                            <td>
                                <a href="{{url('group-re-store/'.$item->id)}}" class="badge py-2 px-2 btn-danger">Re-store</a>
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
