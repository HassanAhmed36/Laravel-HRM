@extends('Layout.master')
@section('main_section')
 @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title fs-4 fw-semibold">Attendance</h3>
                        <div>
                            <form action="" method="GET" class="d-flex gap-2">
                                <input type="date" class="form-control" name="date">
                                <button class="btn btn-primary">Filter</button>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>UserName</th>
                                <th>Check In</th>
                                <th>Check In</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $attendance)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $attendance->user->name }}</td>
                                    <td>
                                        {{ $attendance->check_in ?? '-' }}
                                    </td>
                                    <td>
                                        {{ $attendance->check_out ?? '-' }}
                                    </td>
                                    <td>
                                        {{ App\Helpers\CustomHelper::getAttendanceStatus($attendance->status) }}
                                    </td>
                                    <td>
                                        @can('permission' , 'attendance_update')    
                                        <button class="btn btn-outline-primary btn-sm edit-btn"
                                            data-id="{{ $attendance->id }}">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div id="editModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            @include('partials.modals.attendance-modal')
        </div>

    </div>
    <script>
        $('.edit-btn').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: "{{ route('get.attendance.data') }}",
                method: "GET",
                data: {
                    id: id
                },
                success: function(response) {
                    console.log(response);
                    $('#editModal').modal('show');
                    $('#editModal').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    </script>
@endsection
