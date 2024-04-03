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
                        <h3 class="card-title fs-4 fw-semibold">Schedule Interview</h3>
                        <div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#add-interview"><i class="fa fa-plus-circle me-2"></i>Schedule now</button>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Candidate Name</th>
                                <th>Schedule time</th>
                                <th>Interview type</th>
                                <th>Status</th>
                                <th>interviewer</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($scheduleInterviews as $interview)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $interview->candidate->name }}</td>
                                    <td>{{ $interview->candidate->email }}</td>
                                    <td>{{ $interview->candidate->phone }}</td>
                                    <td>
                                        @if ($interview->status == 'scheduled')
                                            <span class="badge badge-pill badge-soft-info">In Progress</span>
                                        @elseif ($interview->status == 'completed')
                                            <span class="badge badge-pill badge-soft-success">Selected</span>
                                        @elseif ($interview->status == 'rejected')
                                            <span class="badge badge-pill badge-soft-danger">Rejected</span>
                                        @elseif ($interview->status == 'on_hold')
                                            <span class="badge badge-pill badge-soft-warning">On Hold</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button data-id="{{ $interview->id }}" class="btn btn-primary btn-sm mr-2 edit-btn">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        <form action="{{ route('interview-schedule.destroy', ['id' => $interview->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm mr-2"
                                                onclick="return confirm('Are you sure you want to delete this interview schedule?')">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Interview Modal -->
    <div id="add-interview" class="modal fade" tabindex="-1" aria-labelledby="add-interview-label" aria-hidden="true">
        {{-- @include('partials.modals.add-interview') --}}
    </div>

    <!-- Edit Interview Modal -->
    <div id="edit-interview" class="modal fade" tabindex="-1" aria-labelledby="edit-interview-label" aria-hidden="true">
        {{-- @include('partials.modals.edit-interview') --}}
    </div>
@endsection

@section('scripts')
    <script>
        $('.edit-btn').click(function(e) {
            e.preventDefault();
            var interviewId = $(this).data('id');
            var url = "{{ route('interview.schedule.edit', ':id') }}".replace(':id', interviewId);
            $.ajax({
                url: url,
                method: "GET",
                success: function(response) {
                    $('#edit-interview').html(response);
                    $('#edit-interview').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    </script>
@endsection
