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
                        <h3 class="card-title fs-4 fw-semibold">Allowances</h3>
                        <div>
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                                data-bs-target="#myModal"><i class="fa fa-plus-circle me-2"></i> Add Allowance</button>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>allowance name</th>
                                <th>amount</th>
                                <th>month</th>
                                <th>username</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allowances as $allowance)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $allowance->name }}</td>
                                    <td>{{ $allowance->amount }}</td>
                                    <td>{{ $allowance->month }}</td>
                                    <td>{{ $allowance->user->name }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ route('allowance.delete', ['id' => $allowance->id]) }}">
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
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form action="{{ route('allowance.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Allowance</h5>
                        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row align-items-center ">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Allowance Name</label>
                                    <input class="form-control" placeholder="Add Allowance Name" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Amount</label>
                                    <input type="number" class="form-control" placeholder="Add Amount" name="amount"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Month</label>
                                    <input type="month" class="form-control" placeholder="Select Month" name="month"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3" id="all-employee">
                                <label class="form-label">All Employee</label>
                                <select class="form-select" id="employee-dropdown" name="user_id">
                                    <option selected disabled>Select Employee</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">
                                            {{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-check pt-1">
                                    <input class="form-check-input mt-2" type="checkbox" value="1"
                                        id="all-employee-check" name="all_employee">
                                    <label class="form-check-label text-black pt-1" for="all-employee-check pt-1">All
                                        Employee</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-block">Add Allowance</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#all-employee-check').change(function() {
                let value = $(this).prop('checked')
                if (value) {
                    $('#all-employee').hide();
                    $('#employee-dropdown').prop('disabled', true);
                } else {
                    $('#all-employee').show();
                    $('#employee-dropdown').prop('disabled', false);
                }
            });
            $('#all-employee-check').change();
        });
    </script>
@endsection
