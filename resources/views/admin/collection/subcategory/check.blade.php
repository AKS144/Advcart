@extends('layouts.admin')
@section('content')

<!-- Modal -->
<div class="modal fade" id="SubCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sub-Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{url('sub-category-store')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field()}}

      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label for="">Subcategory ID(Name)</label>
                    <select name="group_id" class="form-control">
                        <option value="">Select</option>
                        @foreach ($subcategory as $gitem)
                            <option value="{{ $gitem->id }}">{{ $gitem->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label for="">Name</label>
                    <input rows="text" name="name" class="form-control" placeholder="Enter Name">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                <label for="">Description</label>
                    <textarea rows="4" name="description" class="form-control" placeholder="Enter Description"></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label for="">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Show|Hide</label>
                    <input name="status" class="" type="checkbox">
                </div>
            </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>

    </form>

    </div>
  </div>
</div>


<div class="container-fluid mt-5">
<div class="row">
    <div class="col-md-12">
        <!-- Heading -->
        <div class="card mb-4 wow fadeIn">
          <!--Card content-->
          <div class="card-body d-sm-flex justify-content-between">
            <h4 class="mb-2 mb-sm-0 pt-1">
              <a href="#">Collections|Sub-category</a>
              <a href="{{ url('/sub-category-store') }}" class="badge btn btn-primary p-2 text-white float-right ml-2">Add for SubCat</a>
              <button type="button" href="#" data-toggle="modal" data-target="#SubCategoryModal" class="badge btn btn-primary p-2 text-white float-right">ADD Sub-Category</button>
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
                    <th>Show|Hide</th>
                    <th>Action</th>
                </thead>
                @foreach($subcategory as $item)
                <tbody>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name}}</td>
                    <td>{{ $item->group->name}}</td><!--group is function used in belongsto-->
                    <td>{{ $item->description}}</td>
                    <td>
                        <img src="{{asset('uploads/categoryimage/'.$item->image)}}" width="50px" alt=""/>
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

<script>
$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  })

</script>
