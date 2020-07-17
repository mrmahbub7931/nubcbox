@extends( 'layouts.backend.app' )

@section( 'title','Users' )
@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section( 'content' )
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <a href="{{ route('admin.u.create') }}"><button class="btn btn-success btn-flat"><i class="fa fa-plus-square-o"></i> {{ __(' New User') }} </button></a>
                        </div>
                        <div class="box-body">
                            
                            <table id="userDataTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $users as $key => $user )
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td style="text-align: center">
                                        @if($user->role_id == 1)
                                            <small class="label pull-center bg-green">Admin</small>
                                        @elseif($user->role_id == 2)
                                            <small class="label pull-center bg-green">Author</small>
                                        @else 
                                            <small class="label pull-center bg-green">Subscriber</small>
                                        @endif
                                    </td>
                                    <td style="text-align: center">
                                        @if( $user->role_id == 1 )
                                            <button class="btn btn-danger flat-btn disabled"><i class="fa fa-frown-o"></i></button>
                                        @else
                                            <button onclick="deleteUser({{ $user->id }})" class="btn btn-danger flat-btn "><i class="fa fa-trash-o"></i></button>
                                            <form action="{{ route('admin.u.destroy',$user->id) }}" method="post"
                                                  style="display: none" id="delete-form-{{ $user->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        @endif
                                        
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
@endsection

@push('js')
<script src="{{ asset('backend/assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script type="text/javascript">
        (function ($) {
            $(document).ready(function () {
                $("#userDataTable").DataTable({
                    'paging'      : true,
                    'lengthChange': false,
                    'searching'   : true,
                    'ordering'    : true,
                    'info'        : true,
                    'autoWidth'   : true
                });
            });
        })(jQuery);

        function deleteUser(id) {
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