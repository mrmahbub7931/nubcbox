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
              <span class="info-box-icon bg-aqua"><i class="fa fa-envelope"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Mail</span>
                <span class="info-box-number"> {{ App\SubCategory::findOrfail(Auth::user()->subcategory_id)->mails->count() }} </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

    </div>
</section>
@endsection