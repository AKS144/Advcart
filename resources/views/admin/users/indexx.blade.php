use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Cache;

@extends('layouts.admin')
@section('content')


    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="https://mdbootstrap.com/docs/jquery/" target="_blank">Home Page</a>
            <span>/</span>
            <span>Registered Users</span>
          </h4>

        </div>

      </div>
      <!-- Heading -->

    </div>

    <div class="row">
        <div class="col-md-8">
            <form action="{{ url('registered-user') }}" method="GET">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select name="roles" class="form-control">
                                <?php if(isset($_GET['roles'])){ ?>
                                     <option value="{{$_GET['roles']}}">{{$_GET['roles']}}</option>
                                     <option value="admin">admin</option>
                                     <option value="vendor">vendor</option>
                                <?php }else{ ?>
                                     <option value="">Default</option>
                                     <option value="admin">admin</option>
                                     <option value="vendor">vendor</option>
                                    <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary py-2">Filter</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
              <div class="card">
                <h5>
                    <?php $u_total = '0'; 
                    foreach($users as $item){                     
                        if($item->isUseronline())
                        {
                            $u_total = $u_total + 1;
                        }
                      ?>                        
                       Total User Online: { $u_total };                    
                    <?php }?>
                </h5>
             </div>
           </div>
        <div class="col-md-12">
            <div class="card">
            <div class="card-body">
                <?php $users = User::get(); ?>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="text-center">Online/Offline</th>
                            <th class="text-center">Ban/Unban</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $data) {?>
                        <tr>
                        <td>{{ $data->id}}</td>
                        <td>{{ $data->name}}</td>
                        <td>{{ $data->email}}</td>
                        <td>{{ $data->role_as}}</td>
                        <td>
                        
                            <?php if(Cache::has('user-is-online' .$data->id)){?>
                                <span class="text-success">Online</span>
                            <?php }else{?>
                                <span class="text-secondary">Offline</span>
                            <?php }?>
                        </td>
                        <td>
                            <?php if($data->isban == '0'){ ?>
                                <label class="py-2 px-3 badge btn-primary">Not Banned</label>
                            <?php }elseif($data->isban == '1'){ ?>
                                <label class="py-2 px-3 badge btn-danger">Banned</label>
                            <?php }?>
                        </td>
                            <td>
                                <a href="{{url('/role-edit/'.$data->id)}}" class="badge badge-pill btn-primary px-3 py-2">Edit</a>
                                <a href="" class="badge badge-pill btn-danger px-3 py-2">Delete</a>
                            </td>
                        </tr>
                         <?php } ?>
                    </tbody>
                </table>

            </div>
            </div>
        </div>
    </div>
@endsection
