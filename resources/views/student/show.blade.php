@extends('student.home')

@section('container')

<div class="container py-5">
    <div class="row">
        <h2 class="bg-info py-3">
            Student Details
            <a href="{{ route('student.create') }}" class="btn btn-success btn-sm float-end">Home</a>
        </h2>
        <div class="col-md-12">
            <div class="card">
                <img src="{{ asset('images/'.$student->photo) }}" class="card-img-top" alt="Image">
                <div class="card-body">
                  <h5 class="card-title">Nmae : {{ $student->name }}</h5>
                  <h5 class="card-title">Email : {{ $student->email }}</h5>
                  <h5 class="card-title">Roll  : {{ $student->roll }}</h5>
                  <h5 class="card-title">Reg  : {{ $student->reg }}</h5>
                  <h5 class="card-title">Phone : {{ $student->phone }}</h5>
                  <h5 class="card-title">Address : {{ $student->address }}</h5>
                  <p class="card-text">About : {{ $student->about }}</p>
                </div>
              </div>
        </div>
    </div>
</div>

@endsection
