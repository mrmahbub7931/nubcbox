@extends( 'layouts.backend.app' )

@section( 'title','All Emails' )
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
                            <h3>Emails</h3>
                            
                        </div>
                        <div class="box-body">
                            <table id="emailDataTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Subject Name</th>
                                    <th>Is Approved</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($mails as $key => $mail)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
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
                                    <a href="{{ route('author.email.show',$mail->id) }}"><button class="btn btn-info flat-btn btn-sm"><i class="fa fa-eye"></i></button></a>
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
   </script>
@endpush