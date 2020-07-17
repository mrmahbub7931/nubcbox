@extends( 'layouts.backend.app' )

@section( 'title','Users' )
@push('css')

@endpush

@section( 'content' )

    <section class="content">
        <div class="col-md-12 col-lg-6 mt-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">New Department</h3>
                </div>
                <!-- /.box-header -->
                <div>
                    @if($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <!-- form start -->
                <form role="form" action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <label for="name">Student Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Student Name">
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <label for="email">Student Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Student Email">
                            </div>
                        </div>
                      
                    </div>
                    <div class="form-group">
                      <label for="student_id">Student Id</label>
                      <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Enter Student Id">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <label for="department">Student Department</label>
                      <input type="text" class="form-control" id="department" name="department" placeholder="Enter Department name">
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <label for="shift">Shift</label>
                      <input type="text" class="form-control" id="shift" name="shift" placeholder="ex: Day or Evening">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="password">Account Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                    </div>
                    
                    <div class="form-group">
                        <label for="avatar">Upload avatar</label>
                        <input type="file" id="avatar" name="avatar">
      
                        <p class="help-block">Upload your avatar here.</p>
                      </div>

                  </div>
                  <!-- /.box-body -->
    
                  <div class="box-footer">
                    <button type="submit" class="btn btn-success btn-flat">Submit</button>
                    <a href="{{ route('admin.users.index') }}"><button type="submit" class="btn btn-primary btn-flat">Back</button></a>
                  </div>
                </form>
            </div>
        </div>

    </section>

@endsection

@push('js')

@endpush