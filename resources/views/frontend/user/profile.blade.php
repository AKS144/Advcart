@extends('layouts.frontend')

@section('title')
    My Profile
@endsection

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4>My Profile</h4>
                        <hr>
                        <form action="{{url('my-profile-update')}}" method="Post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="">First Name</label>
                                      <input type="text" class="form-control" name="fname" value="{{Auth::user()->fname}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="">Last Name</label>
                                      <input type="text" class="form-control" name="lname"  value="{{Auth::user()->lname}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="">Email</label>
                                      <input type="text" class="form-control" name="email"  value="{{Auth::user()->email}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="">Address 1(Flat)</label>
                                      <input type="text" class="form-control" name="address1"  value="{{Auth::user()->address1}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="">Address 2(Landmark)</label>
                                      <input type="text" class="form-control" name="address2"  value="{{Auth::user()->address2}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="">City</label>
                                      <input type="text" class="form-control" name="city"  value="{{Auth::user()->city}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="">State</label>
                                      <input type="text" class="form-control" name="state"  value="{{Auth::user()->state}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="">Pincode</label>
                                      <input type="text" class="form-control" name="pincode"  value="{{Auth::user()->pincode}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="">Phone Number</label>
                                      <input type="text" class="form-control" name="phone"  value="{{Auth::user()->phone}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="">Alternate Phone Number</label>
                                      <input type="text" class="form-control" name="alternate_phone"  value="{{Auth::user()->alternate_phone}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="">Your Profile</label>
                                     <button class="btn btn-primary" type="submit">Update </button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <input type="file" name="image" class="form-control"><tr>
                                    <img src="{{asset('images/'.Auth::user()->image)}}" alt="" class="w-75">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
