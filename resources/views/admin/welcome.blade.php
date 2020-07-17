@extends( 'layouts.backend.app' )

@section( 'title','Dashboard' ) 

@section( 'content' )
<section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-th-large"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Department</span>
                <span class="info-box-number"> {{ App\Category::count() }} </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-user-plus"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Emlpoyee</span>
                <span class="info-box-number"> {{ App\SubCategory::count() }} </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-graduation-cap"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Students</span>
                <span class="info-box-number"> {{ App\User::where([['role_id', '=', 3],])->count() }} </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Users</span>
                <span class="info-box-number"> {{ App\User::count() }} </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-envelope"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Email</span>
                <span class="info-box-number"> {{ App\Mail::count() }} </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

    </div>
</section>
@endsection