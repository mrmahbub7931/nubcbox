@extends( 'layouts.backend.app' )

@section( 'title','Employee' )
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
                            <a href="{{ route('admin.sub_category.create') }}"><button class="btn btn-success btn-flat"><i class="fa fa-plus-square-o"></i> {{ __(' New Employee') }} </button></a>
                        </div>
                        <div class="box-body">
                            <table id="categoryDataTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Employee Name</th>
                                    <th>Designation</th>
                                    <th>Department Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $subCategorys as $key => $subCategory )
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $subCategory->sub_category_name }}</td>
                                    <td>{{ $subCategory->sub_category_designation }}</td>
                                    <td>{{ $subCategory->category->category_name }}</td>
                                    <td>{{ $subCategory->sub_category_email }}</td>
                                    <td>
                                        <button onclick="deleteSubCategory({{ $subCategory->id }})" class="btn btn-danger btn-sm "><i class="fa fa-trash-o"></i></button>
                                            <form action="{{ route('admin.sub_category.destroy',$subCategory->id) }}" method="post"
                                                  style="display: none" id="delete-form-{{ $subCategory->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        <a href="{{ route('admin.sub_category.edit',$subCategory->id) }}"><span class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></span></a>
                                        <a href=" {{ route('admin.sub_category.show',$subCategory->id) }} "><button class="btn btn-info flat-btn"><i class="fa fa-eye"></i></button></a>
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
<script src="{{ asset('backend/assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>
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

        function deleteSubCategory(id) {
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