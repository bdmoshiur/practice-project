@extends('student.home')

@section('container')

<div class="container py-5">
    <div class="row">
        <h2 class="bg-info py-3">
            Student Info
            <a href="{{ route('student.create') }}" class="btn btn-success btn-sm float-end">Home</a>
        </h2>
        <div class="col-md-3">
            <h2 class="bg-info p-3">
                @if(isset($edit_student))
                    Edit Student
                @else
                    Add Student
                @endif
            </h2>
            <div>
                @if (Session::has('message'))
                    <h2 class="alert alert-success">{{ Session::get('message') }}</h2>
                @endif
            </div>
            @if(isset($edit_student))
                <form action="{{ route('student.update',$edit_student->id) }}" method="post" enctype="multipart/form-data">
            @else
                <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data">
            @endif
                @csrf
                <div class="form-group pt-3">
                    <label for="">Name</label>
                    <input class="form-control" type="text" name="name" id="" value="{{ isset($edit_student)? $edit_student->name : old('name') }}" placeholder="">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="form-group pt-3">
                    <label for="">Email</label>
                    <input class="form-control" type="email" name="email" id="" value="{{ isset($edit_student)? $edit_student->email : old('email') }}" placeholder="">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="form-group pt-3">
                    <label for="">Roll No</label>
                    <input class="form-control" type="text" name="roll" id="" value="{{ isset($edit_student)? $edit_student->roll : old('roll') }}" placeholder="">
                        @error('roll')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="form-group pt-3">
                    <label for="">Reg No</label>
                    <input class="form-control" type="text" name="reg" id="" value="{{ isset($edit_student)? $edit_student->reg : old('reg') }}" placeholder="">
                        @error('reg')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="form-group pt-3">
                    <label for="">Phone</label>
                    <input class="form-control" type="text" name="phone" id="" value="{{ isset($edit_student)? $edit_student->phone : old('phone') }}" placeholder="">
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="form-group pt-3">
                    <label for="">Address</label>
                    <input class="form-control" type="text" name="address" id="" value="{{ isset($edit_student)? $edit_student->address : old('address') }}" placeholder="">
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="form-group pt-3">
                    <label for="">About Us</label>
                   <textarea class="form-control" name="about" id="" cols="" rows="">{{ isset($edit_student)? $edit_student->about : old('about') }}</textarea>
                        @error('about')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="form-group pt-3">
                    <label for="">Photo</label>
                    <input class="form-control" type="file" name="photo" id="" value="" placeholder="">
                        @error('photo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="form-group pt-3">
                    @if(isset($edit_student))
                        <input class="form-control btn btn-info" type="submit" value="Update Student">
                    @else
                        <input class="form-control btn btn-info" type="submit" value="Add Student">
                    @endif
                </div>
            </form>
        </div>
        <div class="col-md-9">
            <h2 class="bg-info p-3">
                All Student
            </h2>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Roll</th>
                    <th scope="col">Reg</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($students as $key => $student)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->roll }}</td>
                            <td>{{ $student->reg }}</td>
                            <td><img src="{{ asset('images/'.$student->photo) }}" height="60px" height="60px" alt="Image"></td>
                            <td>
                                <a href="{{ route('student.edit',$student->id) }}" class="btn btn-info btn-sm my-1">Edit</a>
                                <a href="{{ route('student.show',$student->id) }}" class="btn btn-success btn-sm my-1">View</a>
                                <a href="{{ route('student.destroy',$student->id) }}" class="btn btn-danger btn-sm my-1" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
              {{ $students->links() }}
        </div>
    </div>
</div>

@endsection
