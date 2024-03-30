@extends('admin.layouts.master')

@section('content')

<style>
    /* body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
    }
    form {
        margin-bottom: 20px;
    } */
    /* button {
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
    } */
</style>

<section class="section">
    <div class="section-header">
        <h1>Upload Student Excelsheet Details:</h1>
    </div>
    <div class="section-body">
        {{-- <h1 class="section-title"></h1>
        <p class="section-lead">
            Please enter details carefully
        </p> --}}
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                    <form method="post" action="{{ route('admin.student.import')}}"  class="needs-validation" novalidate=""  enctype="multipart/form-data">
                        @csrf
                        <label for="student-file"></label>
                    <div class="card-body">

                        <input type="file" class="btn btn-primary" name="csv_file"  id="student-file">
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Import Student</button>
                    </div>
                    </form>
                    @if(session('success'))
                        <div style="color: green;">{{ session('success') }}</div>
                    @endif
                </div>

                </div>
            </div>
        </div>

    </div>
</section>

@endsection
