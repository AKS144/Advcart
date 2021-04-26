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
               <form action="{{url('group-store')}}" method="POST">
                {{ csrf_field()}}
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Custom URL</label>
                        <div class="form-group">
                            <input rows="text" name="url" class="form-control" placeholder="Enter URL">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="">Name</label>
                        <div class="form-group">
                            <input rows="text" name="name" class="form-control" placeholder="Enter Name">
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label for="">Description</label>
                        <div class="form-group">
                            <textarea rows="4" name="descrip" class="form-control" placeholder="Enter Description"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Show | Hide</label>
                            <input name="status" type="checkbox">
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
