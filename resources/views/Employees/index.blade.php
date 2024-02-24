@extends('Layout.master')
@section('main_section')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title fs-4 fw-semibold">All Employee</h3>
                        <div>
                            <a href="{{ route('employee.create') }}" class="btn btn-primary"><i
                                    class="fa fa-plus-circle me-2"></i>Add new Employee</a>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>EMP ID</th>
                                <th>name</th>
                                <th>Designation</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Users as $User)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $User->Emp_Id }}</td>
                                    <td>{{ $User->name }}</td>
                                    <td>{{ $User->designation->name }}</td>
                                    <td>
                                        <span
                                            class="badge badge-pill badge-soft-{{ $User->is_active ? 'success' : 'danger' }}">
                                            {{ $User->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('employee.edit', ['id' => $User->id]) }}"
                                            class="btn btn-outline-info btn-sm edit" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('employee.delete', ['id' => $User->id]) }}"
                                            class="btn btn-outline-danger btn-sm edit" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
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
@endsection
