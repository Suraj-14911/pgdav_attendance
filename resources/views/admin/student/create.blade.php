@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Add Student</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Enter Details</h2>
            <p class="section-lead">
                Please enter details carefully
            </p>
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" action="{{ route('admin.student.store') }}"  class="needs-validation" novalidate="">
                            @csrf

                        <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label>Roll_NO</label>
                              <input type="text" class="form-control" name="roll_no" placeholder="Roll_NO" required="">
                              <div class="invalid-feedback">
                                Please fill in the student Roll_NO
                              </div>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label>University Rollno</label>
                                <input type="text" class="form-control" name="university_rollno" required="">
                                <div class="invalid-feedback">
                                  Please fill in the  name
                                </div>
                              </div>

                        </div>


                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label>Name</label>
                              <input type="text" class="form-control" name="name" placeholder="Email" required="">
                              <div class="invalid-feedback">
                                Please fill in the student email
                              </div>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" placeholder="course" required="">
                                <div class="invalid-feedback">
                                  Please fill in the  course
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label>Course</label>
                              <input type="text" class="form-control" name="course" placeholder="Email" required="">
                              <div class="invalid-feedback">
                                Please fill in the section
                              </div>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label>Section</label>
                                <input type="text" class="form-control" name="section" placeholder="subject_1" required="">
                                <div class="invalid-feedback">
                                  Please fill in the  subject 1
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label>Subject_1</label>
                              <input type="text" class="form-control" name="subject_1" placeholder="Email" required="">
                              <div class="invalid-feedback">
                                Please fill in the subject 2
                              </div>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label>Subject_2</label>
                                <input type="text" class="form-control"  name="subject_2" placeholder="subject_3" required="">
                                <div class="invalid-feedback">
                                  Please fill in the  subject 3
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label>Subject_3</label>
                              <input type="text" class="form-control" name="subject_3" placeholder="Email" required="">
                              <div class="invalid-feedback">
                                Please fill in the subject 4
                              </div>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label>Subject_4</label>
                                <input type="text" class="form-control" name="subject_4" placeholder="subject_5" required="">
                                <div class="invalid-feedback">
                                  Please fill in the  subject 5
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label>Subject_5</label>
                              <input type="text" class="form-control" name="subject_5" placeholder="Email" required="">
                              <div class="invalid-feedback">
                                Please fill in the subject 6
                              </div>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label>Subject_6</label>
                                <input type="text" class="form-control" name="subject_6" placeholder="subject_" required="">
                                <div class="invalid-feedback">
                                  Please fill in the  subject 7
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-6 col-12">
                                <label>Subject_7</label>
                                <input type="text" class="form-control" name="subject_7" placeholder="Email" required="">
                                <div class="invalid-feedback">
                                  Please fill in the subject 6
                                </div>
                              </div>
                        </div>

                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">ADD STUDENT</button>
                          </div>
                        </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
