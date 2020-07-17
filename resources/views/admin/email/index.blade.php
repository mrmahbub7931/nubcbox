@extends( 'layouts.backend.app' )

@section( 'title','All Emails' )
@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section( 'content' )
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header" style="display: inline-block">
                        <h3>{{ __(' Emails ') }}<span class="pull-right-container">
                            <small class="label pull-right bg-green"> {{ $mails->count() }} </small>
                          </span></h3>
                    </div>
                    <div class="box-body">
                        <table id="emailDataTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>From</th>
                                <th>Subject</th>
                                <th>Permission</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($mails as $key => $mail)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $mail->user->name }}</td>
                                <td> {{ $mail->subject }} </td>
                                @if($mail->status == 1)

                                    <td class="text-center">
                                        <span class="label bg-green">
                                            Approved
                                        </span>
                                    </td>

                                @else
                                    <td class="text-center">
                                        <span class="label bg-red">
                                            Pending
                                        </span>
                                    </td>

                                @endif
                                
                                <td>
                                    {{ date('F d, Y | h:i:s', strtotime($mail->created_at)) }}
                                </td>
                                
                                <td>
                                    <button onclick="deleteCategory({{ $mail->id }})" class="btn btn-danger flat-btn "><i class="fa fa-trash-o"></i></button>
                                    <form action="{{ route('admin.email.delete',$mail->id) }}" method="post"
                                        style="display: none" id="delete-form-{{$mail->id}}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a href="{{ route('admin.email.show',$mail->id) }}"><span class="btn btn-info flat-btn"><i class="fa fa-eye"></i></span></a>
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
    <!-- Required datatable js -->
    <script src="{{ asset('backend/assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    {{-- sweet alert js --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script type="text/javascript">
        (function ($) {
            $(document).ready(function () {
                $("#emailDataTable").DataTable({
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