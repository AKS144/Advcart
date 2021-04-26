    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">

      <a class="logo-wrapper waves-effect">
        <img src="{{asset('img/logo/mdb-email.png')}}" class="img-fluid" alt="">
      </a>

      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item active waves-effect">
          <i class="fas fa-chart-pie mr-3"></i>Dashboard
        </a>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-user mr-3"></i>Profile</a>

        <a href="{{ url('group')}}"  class="list-group-item list-group-item-action waves-effect ">
          <i class="fas fa-user mr-3"></i>Groups</a>
        <a href="{{url('/category')}}" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-table mr-3"></i>Category</a>
        <a href="{{url('/sub-category')}}" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-map mr-3"></i>Sub-category</a>
        <a href="{{ url('/products') }}" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-users mr-3"></i>Products</a>
      </div>

    </div>
    <!-- Sidebar -->
