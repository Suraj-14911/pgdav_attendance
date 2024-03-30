@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Add User</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Enter Details</h2>
            <p class="section-lead">
                Please enter details carefully
            </p>
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" action="{{ route('admin.user.store') }}"  class="needs-validation" novalidate="">
                            @csrf

                        <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label>Name</label>
                              <input type="text" class="form-control" name="name" placeholder="Roll_NO" required="">
                              <div class="invalid-feedback">
                                Please fill in the Name
                              </div>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required="">
                                <div class="invalid-feedback">
                                  Please fill in the Email
                                </div>
                              </div>

                        </div>


                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label>role</label>
                              <input type="text" class="form-control" name="role" placeholder="Email" required="">
                              <div class="invalid-feedback">
                                Please fill in the Type of User-> admin,teacher,student
                              </div>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label>Status</label>
                                <input type="text" class="form-control" name="status" placeholder="active|inactive" required="">
                                <div class="invalid-feedback">
                                  Please fill in the  weather the stundnt is active or not
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label>password</label>
                              <input type="password" class="form-control" name="password" placeholder="Email" required="">
                              <div class="invalid-feedback">
                                Please fill in the
                              </div>
                            </div>

                        </div>


                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">ADD TEACHER</button>
                          </div>
                        </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
