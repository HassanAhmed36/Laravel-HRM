@extends('Layout.auth-master')
@section('main_section')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card overflow-hidden">
                <div class="bg-primary-subtle">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-4">
                                <h5 class="text-primary">Forget Password</h5>
                                <p>Reset Password with HRM.</p>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="{{ asset('assets/images/profile-img.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div>
                        <a href="index-2.html">
                            <div class="avatar-md profile-user-wid mb-4">
                                <span class="avatar-title rounded-circle bg-light">
                                    <img src="{{ asset('assets/images/logo.svg') }}" alt="" class="rounded-circle"
                                        height="34">
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="p-2">
                        <div class="alert alert-success text-center mb-4" role="alert">
                            Enter your Email and instructions will be sent to you!
                        </div>
                        <form class="form-horizontal" action="https://themesbrand.com/skote/layouts/index.html">
                            <div class="mb-3">
                                <label for="useremail" class="form-label">Email</label>
                                <input type="email" class="form-control" name="Email" placeholder="Enter email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary w-md waves-effect waves-light w-100"
                                    type="submit">Forget</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
