@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Edit Student</h2></div>

                    <div class="card-body">
                        @include('custom.message')

                            <form action="{{ route('student.update', $student->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="container">
                                    <h3>Required Data</h3>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{ old('first_name', $student->first_name) }}" >
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="{{ old('last_name', $student->last_name) }}" >
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-control" name="student_type_id" id="student_type_id">
                                            @foreach($student_types as $student_type)
                                                @isset($student_type->id)
                                                    <option value="{{ $student_type->id }}" {{ $student_type->id == $student->type_of_student? 'selected' : '' }}>{{ $student_type->name }}</option>
                                                @endisset
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-control" name="nationality_id" id="nationality_id">
                                            @foreach($nationalities as $nationality)
                                                @isset($nationality->id)
                                                    <option value="{{ $nationality->id }}" {{ $nationality->id == $student->nationality_id? 'selected' : '' }}>{{ $nationality->name }}</option>
                                                @endisset
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-control" name="document_type_id" id="document_type_id">
                                            @foreach($document_types as $document_type)
                                                @isset($document_type->id)
                                                    <option value="{{ $document_type->id }}" {{ $document_type->id == $student->document_type ? 'selected' : '' }}>{{ $document_type->name }}</option>
                                                @endisset
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="document_number" id="document_number" placeholder="Document Number" value="{{ old('document_number', $student->document_number) }}" >
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="file_number" id="file_number" placeholder="File Number" value="{{ old('file_number', $student->file_number) }}" >
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Phone Number" value="{{ old('phone_number', $student->phone_number) }}" >
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email', $student->email) }}" >
                                    </div>

                                    <hr>
                                    <input type="submit" class="btn btn-primary" value="Save">
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
