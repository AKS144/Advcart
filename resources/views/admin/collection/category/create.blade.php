@extends('layouts.admin')
@section('content')

<div class="container-fluid mt-6">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6>Collection|Category Form</h6>
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
               <form action="{{ url('category-store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="">Group ID(Name)</label>
                            <select name="group_id" class="form-control">
                                <option value="">Select</option>
                                @foreach ($group as $gitem)
                                    <option value="{{ $gitem->id }}">{{ $gitem->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="">Custom URL</label>
                        <div class="form-group">
                            <input rows="text" name="url" class="form-control" placeholder="Enter URL">
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
                            <input type="file" name="category_img" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="">Icon</label>
                            <input type="file" name="category_icon" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Show|Hide</label>
                            <input name="status" class="" type="checkbox">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                </div>
               </form>
            </div>
        </div>
    </div>
</div>

@endsection
