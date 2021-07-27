@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>View Student</h2></div>

                    <div class="card-body">
                        @include('custom.message')

                            <form action="{{ route('student.update', $student->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="container">
                                    <h3>Required Data</h3>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{ old('first_name', $student->first_name) }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="{{ old('last_name', $student->last_name) }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="student_type_id" id="student_type_id" placeholder="Type of Student" value="{{ old('student_type_id', $student_type->name) }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="nationality_id" id="nationality_id" placeholder="Nationality" value="{{ old('nationality_id', $nationality->name) }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="document_type_id" id="document_type_id" placeholder="Document Type" value="{{ old('document_type_id', $document_type->name) }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="document_number" id="document_number" placeholder="Document Number" value="{{ old('document_number', $student->document_number) }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="file_number" id="file_number" placeholder="File Number" value="{{ old('file_number', $student->file_number) }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Phone Number" value="{{ old('phone_number', $student->phone_number) }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email', $student->email) }}" disabled>
                                    </div>

                                    <hr>
                                    <a href="{{ route('student.edit', $student->id) }}" class="btn btn-success">Edit</a>
                                    <a href="{{ route('student.index') }}" class="btn btn-danger">Back</a>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
