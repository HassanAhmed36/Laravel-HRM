@extends('Layout.master')
@section('main_section')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title fs-4 fw-semibold">Jobs</h3>
                        <div>
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                                data-bs-target="#add-job"><i class="fa fa-plus-circle me-2"></i> Add Jobs</button>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>title</th>
                                <th>salary</th>
                                <th>positions available</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $job)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->salary }}</td>
                                    <td>{{ $job->positions_available }}</td>
                                    <td>
                                        @if ($job->is_active)
                                            <span class="badge badge-pill badge-soft-success">Active</span>
                                        @else
                                            <span class="badge badge-pill badge-soft-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button data-id="{{ $job->id }}" class="btn btn-primary btn-sm mr-2 edit-btn">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button data-id="{{ $job->id }}" class="btn btn-warning btn-sm  mr-2 show-btn">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        <a href="{{ route('job.delete' , ['id' => $job->id]) }}" class="btn btn-danger btn-sm mr-2">
                                            <i class="fa fa-trash"></i>
                                        </a>
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
        <div id="add-job" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Add New Job</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('job.store') }}" method="POST">
                        @csrf
                        <div class="modal-body row">
                            <div class="col-4">
                                <label for="" class="form-label">Job title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Job title"
                                    required>
                            </div>
                            <div class="col-4 mb-3">
                                <label for="" class="form-label">salary</label>
                                <input type="text" name="salary" class="form-control" placeholder="Enter Salary"
                                    required>
                            </div>
                            <div class="col-4 mb-3">
                                <label for="" class="form-label">location</label>
                                <input type="text" name="location" class="form-control" placeholder="Enter location"
                                    required>
                            </div>
                            <div class="col-4 mb-3">
                                <label for="" class="form-label">position avalible</label>
                                <input type="number" name="positions_available" class="form-control"
                                    placeholder="Enter avalible position" required>
                            </div>
                            <div class="col-4 mt-4 pt-2">
                                <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                    <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd" checked
                                        name="is_active" value="1">
                                    <label class="form-check-label" for="SwitchCheckSizemd">is active</label>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" rows="4" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect"
                                data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary waves-effect waves-light" type="submit">Add
                                Job</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="editModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            @include('partials.modals.job-edit-model')
        </div>
        <div id="showModal" class="modal fade" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
            @include('partials.modals.show-job-modal')
        </div>
    </div>
    <script>
        $('.edit-btn').click(function(e) {
            e.preventDefault();
            var jobId = $(this).data('id');
            var url = "{{ route('job.edit') }}";
            $.ajax({
                url: url,
                method: "GET",
                data: {
                    id: jobId
                },
                success: function(response) {
                    $('#editModal').html(response);
                    $('#editModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        $('.show-btn').click(function(e) {
            e.preventDefault();
            let JobID = $(this).data('id');
            var url = "{{ route('job.show') }}";
            $.ajax({
                url: url,
                method: "GET",
                data: {
                    id: JobID
                },
                success: function(response) {
                    $('#showModal').html(response);
                    $('#showModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        })
    </script>
@endsection
