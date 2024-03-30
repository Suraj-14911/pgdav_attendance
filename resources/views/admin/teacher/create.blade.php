@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Add Teacher</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Enter Details</h2>
            <p class="section-lead">
                Please enter details carefully
            </p>
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" action="{{ route('admin.teacher.store') }}"  class="needs-validation" novalidate="">
                            @csrf

                        <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label>Teacher ID</label>
                              <input type="text" class="form-control" name="teacher_id" placeholder="Roll_NO" required="">
                              <div class="invalid-feedback">
                                Please fill in the Name
                              </div>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" required="">
                                <div class="invalid-feedback">
                                  Please fill in the Email
                                </div>
                              </div>

                        </div>


                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label>Email</label>
                              <input type="text" class="form-control" name="email" placeholder="Email" required="">
                              <div class="invalid-feedback">
                                Please fill in the Teacher Department
                              </div>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label>Department</label>
                                <input type="text" class="form-control" name="department" placeholder="course" required="">
                                <div class="invalid-feedback">
                                  Please fill in the  Subject 1
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label>Subject 1</label>
                              <input type="text" class="form-control" name="subject_1" placeholder="Email" required="">
                              <div class="invalid-feedback">
                                Please fill in the Subject 2
                              </div>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label>Subject_2</label>
                                <input type="text" class="form-control" name="subject_2" placeholder="subject_1" required="">
                                <div class="invalid-feedback">
                                  Please fill in the  subject 3
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Subject 3</label>
                                <input type="text" class="form-control" name="subject_3" placeholder="Email" required="">
                                <div class="invalid-feedback">
                                  Please fill in the Subject 2
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
