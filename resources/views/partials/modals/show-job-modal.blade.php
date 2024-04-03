@if (isset($job))
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel">Job Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label class="form-label">Job Title:</label>
                        <p id="jobTitle">{{ $job->title }}</p>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="form-label">Location:</label>
                        <p id="jobLocation">{{ $job->location }}</p>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="form-label">Salary:</label>
                        <p id="jobSalary">{{ $job->salary }}</p>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="form-label">Positions Available:</label>
                        <p id="jobPositionsAvailable">{{ $job->positions_available }}</p>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Status:</label>
                        <p id="jobStatus">
                            @if ($job->is_active)
                                <span class="badge badge-pill badge-soft-success">Active</span>
                            @else
                                <span class="badge badge-pill badge-soft-danger">Inactive</span>
                            @endif
                        </p>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label">Description:</label>
                        <p id="jobDescription">{{ $job->description }}</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
@endif
