@extends('Layout.master')
@section('main_section')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title fs-4 fw-semibold">All Designation</h3>
                        <div>
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                                data-bs-target="#myModal"><i class="fa fa-plus-circle me-2"></i>new Designation</button>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>designation name</th>
                                <th>department name</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($designations as $designation)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $designation->name }}</td>
                                    <td>{{ $designation->department->name }}</td>
                                    <td>
                                        @if ($designation->is_active)
                                            <span class="badge badge-pill badge-soft-success">Active</span>
                                        @else
                                            <span class="badge badge-pill badge-soft-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @can('permission' , 'designation_update')
                                        <a class="btn btn-primary btn-sm edit-designation" href="#"
                                            data-id="{{ $designation->id }}"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('permission' , 'designation_delete')
                                        <a class="btn btn-danger btn-sm"
                                            href="{{ route('designation.delete', ['id' => $designation->id]) }}">
                                            <i class="fa fa-trash"></i>
                                        </a>
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
        <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Add New Designation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('designation.store') }}" method="POST">
                        @csrf
                        <div class="modal-body row">
                            <div class="col-6">
                                <label for="" class="form-label">Designation name</label>
                                <input type="text" name="designation_name" class="form-control"
                                    placeholder="Enter Designation name" required>
                            </div>
                            <div class="col-6">
                                <label for="formrow-inputState" class="form-label">Department Name</label>
                                <select id="formrow-inputState" class="form-select" name="department_id" required>
                                    <option value="" selected disabled hidden>Choose...</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 mt-4 pt-2">
                                <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                    <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd" checked
                                        name="is_active" value="1">
                                    <label class="form-check-label" for="SwitchCheckSizemd">is active</label>
                                </div>
                            </div>
                            <div class="col-12 mt-4 pt-2">
                                <h4>Permissions</h4>
                                <br>
                                <table class="table table-bordered ">
                                    <tr>
                                        <th>Entity</th>
                                        <th>View</th>
                                        <th>Create</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                        <th>Details</th>
                                    </tr>
                                    <tr>
                                        <td>Employee</td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="1"></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="2"></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="3"></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="4"></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="5" checked></td>
                                    </tr>
                                    <tr>
                                        <td>Department</td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="6"></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="7"></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="8"></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="9"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Designation</td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="10"></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="11"></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="12"></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="13"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Attendance</td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="14"></td>
                                        <td></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="15"></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Leaves</td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="16"></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="17"></td>
                                        <td></td>
                                        <td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="43">
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Leave Quota</td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="18"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Holiday</td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="19"></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="20"></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="21"></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="22"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Deduction Setting</td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="44"></td>
                                        <td></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="45"></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Allowance</td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="23"></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="24"></td>
                                        <td></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="25"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Payslip</td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="26"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Candidate</td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="27"></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="28"></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="29"></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="30"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Interview Scheduled</td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="31"></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="32"></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="33"></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="34"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Notice Board</td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="35"></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="36"></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="37"></td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="38"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Settings</td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="39"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>My Attendance</td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="40" checked></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>My Payslip</td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="41" checked></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Leave Request</td>
                                        <td><input name="permissions[]" class="form-check-input" type="checkbox"
                                                value="42" checked></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect"
                                data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary waves-effect waves-light" type="submit">Add
                                Designation</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="editModal" class="modal fade edit-modal" tabindex="-1" aria-labelledby="myModalLabel"
            aria-hidden="true">
            @include('partials.modals.designation-edit-modal')
        </div>
    </div>
    <script>
        $('.edit-designation').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: '{{ route('designation.edit') }}',
                method: "GET",
                data: {
                    id: id
                },
                success: function(response) {
                    $('.edit-modal').html(response);
                    $('#editModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    </script>
@endsection
