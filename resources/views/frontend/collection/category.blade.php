@extends('layouts.frontend')
@section('title')
    Collection - Category
@endsection

@section('content')

<div class="container card card-body">
    <div class="row">
        <div class="col-md-12">
            <label for="">Collection/ {{ $group->name}}</label>
        </div>
    </div>
</div>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach ($category as $item)
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <img src="{{ asset('uploads/categoryimage/'.$cate_item->image)}}" class="w-100" alt="">
                            <div class="card-body bg-light">
                                <a href="" class="text-center">
                                    <h4>Hi:{{ $cate_item->name}}</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
