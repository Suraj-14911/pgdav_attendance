@extends('teacher.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Subjects Lists:</h1>
        </div>
        <div class="row">
            @foreach ( $subjects as $value )
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                           
                        </div>
                        <div class="card-body">
                            <h2>{{$value}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">

        </div>
    </section>
    @endsection
