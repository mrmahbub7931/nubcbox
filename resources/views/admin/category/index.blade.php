@extends( 'layouts.backend.app' )

@section( 'title','Department' )
@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
   @endpush

@section( 'content' )
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                        <a href="{{ route('admin.category.create') }}"><button class="btn btn-success btn-flat"><i class="fa fa-plus-square-o"></i>{{ __(' New Department') }}</button></a>
                        </div>
                        <div class="box-body">
                            <table id="categoryDataTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Department Name</th>
                                    
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $categories as $key => $category )
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    
                                    <td>
                                        <button onclick="deleteCategory({{ $category->id }})" class="btn btn-danger flat-btn "><i class="fa fa-trash-o"></i></button>
                                            <form action="{{ route('admin.category.destroy',$category->id) }}" method="post"
                                                  style="display: none" id="delete-form-{{ $category->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        <a href="{{ route('admin.category.edit',$category->id) }}"><span class="btn btn-warning flat-btn"><i class="fa fa-edit"></i></span></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </section>
@endsection

@push('js')
    <!-- Required datatable js -->
    <script src="{{ asset('backend/assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script type="text/javascript">
        (function ($) {
            $(document).ready(function () {
                $("#categoryDataTable").DataTable({
                    'paging'      : true,
                    'lengthChange': false,
                    'searching'   : true,
                    'ordering'    : true,
                    'info'        : true,
                    'autoWidth'   : true
                });
            });
        })(jQuery);

        function deleteCategory(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'This user data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush