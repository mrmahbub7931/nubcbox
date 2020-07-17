@extends( 'layouts.backend.app' )

@section( 'title','Department' )
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
            <form action="{{ route('admin.category.update',$category->id) }}" method="post">
                @csrf
                @method('PUT')
              <div class="box-body">
                <div class="form-group">
                  <label for="category_name">Department Name</label>
                  <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Department Name" value="{{ $category->category_name }}">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success btn-flat">Submit</button>
                <a href="{{ route('admin.category.index') }}"><button type="submit" class="btn btn-primary btn-flat">Back</button></a>
              </div>
            </form>
        </div>
    </div>

</section>

@endsection

@push('js')

@endpush