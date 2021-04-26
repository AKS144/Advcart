@extends('layouts.admin')
@section('content')

<div class="container-fluid mt-6">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6>Collection|Edit Sub-Category</h6>
                    <a href="{{ url('sub-category')}}" class="badge bg-danger p-2 text-white float-right">Back</a>
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

      <form action="{{ url('/sub-category-update/'.$subcategory->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field()}}
        {{ method_field('PUT') }}

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label for="">Subcategory ID(Name)</label>
                    <select name="category_id" class="form-control">
                        <option value="{{$subcategory->category_id}}">{{$subcategory->category->name}}</option>
                        @foreach($category as $gitem)
                            <option value="{{ $gitem->id }}">{{ $gitem->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <label for="">Custom URL</label>
                <div class="form-group">
                    <input rows="text" name="url" value="{{ $subcategory->url }}" class="form-control" placeholder="Enter URL">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label for="">Name</label>
                    <input rows="text" name="name" value="{{ $subcategory->name }}" class="form-control" placeholder="Enter Name">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                <label for="">Description</label>
                    <textarea rows="4" name="description" class="form-control" placeholder="Enter Description">{{$subcategory->description}}</textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label for="">Image</label>
                    <input type="file" name="image" value="{{ $subcategory->image }}" class="form-control">
                    <img src="{{asset('uploads/subcategory/'.$subcategory->image)}}" alt="" width="100px">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Priority</label>
                    <input name="priority" class="form-control" value="{{ $subcategory->priority}}" type="number" placeholder="Priority">
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Show|Hide</label>
                    <input name="status" class="" value="{{ $subcategory->status == '1' ? 'checked': ''}}" type="checkbox" >
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <button type="submit" class="badge btn btn-primary">Save Update</button>
                </div>
            </div>

        </div>
      </div>

    </form>
            </div>
        </div>
    </div>
</div>

@endsection
