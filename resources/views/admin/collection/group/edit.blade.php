@extends('layouts.admin')
@section('content')

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6>Collection|Groups</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-body">
               <form action="{{url('group-update/'.$group->id)}}" method="POST">
                {{ csrf_field()}}
                {{ method_field('PUT')}}
                <div class="row">

                    <div class="col-md-12">
                        <label for="">Custom URL</label>
                        <div class="form-group">
                            <input rows="text" name="url" value="{{ $group->url }}" class="form-control" placeholder="Enter URL">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="">Name</label>
                        <div class="form-group">
                            <input rows="text" name="name" value="{{ $group->name }}" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="">Description</label>
                        <div class="form-group">
                            <textarea rows="4" name="descrip" value="{{ $group->descrip }}" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Show | Hide</label>
                            <input name="status" value="{{ $group->status == '1' ? 'checked' : ''}}" type="checkbox">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </div>

                </div>
               </form>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script>
    $('#summernote').summernote({
      placeholder: 'Hello Bootstrap 4',
      tabsize: 2,
      height: 100
    });
  </script>
@endsection
