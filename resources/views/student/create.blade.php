@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Create Student</h2></div>

                    <div class="card-body">
                        @include('custom.message')

                            <form class="row g-3" action="{{ route('student.store') }}" method="POST">
                                @csrf
                                    <div class="col-md-6 mb-3">
                                        <label for="first_name" class="form-label">First Name</label>
                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" value="{{ old('first_name') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" value="{{ old('last_name') }}">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="student_type_id" class="form-label">Student Type</label>
                                        <select class="form-control @error('student_type_id') is-invalid @enderror" name="student_type_id" id="student_type_id">
                                            @if(empty(old('student_type_id')))
                                                <option value="">Select</option>
                                            @endif
                                            @foreach($student_types as $student_type)
                                                @isset($student_type->id)
                                                   <option value="{{ $student_type->id }}" {{ old('student_type_id') == $student_type->id ? 'selected' : '' }}>{{ $student_type->name }}</option>
                                                @endisset
                                            @endforeach
                                        </select>
                                    </div>
                                <div class="col-md-12 mb-3">
                                    <label for="nationality_id" class="form-label">Nationality</label>
                                    <select class="form-control @error('nationality_id') is-invalid @enderror" name="nationality_id" id="nationality_id">
                                        @if(empty(old('nationality_id')))
                                            <option value="">Select</option>
                                        @endif
                                        @foreach($nationalities as $nationality)
                                            @isset($nationality->id)
                                                <option value="{{ $nationality->id }}" {{ old('nationality_id') == $nationality->id ? 'selected' : '' }}>{{ $nationality->name }}</option>
                                            @endisset
                                        @endforeach
                                    </select>
                                </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="document_type_id" class="form-label">Document Type</label>
                                        <select class="form-control @error('document_type_id') is-invalid @enderror" name="document_type_id" id="document_type_id">
                                            @if(empty(old('document_type_id')))
                                                <option value="">Select</option>
                                            @endif
                                            @foreach($document_types as $document_type)
                                                @isset($document_type->id)
                                                    <option value="{{ $document_type->id }}" {{ old('document_type_id') == $document_type->id ? 'selected' : '' }}>{{ $document_type->name }}</option>
                                                @endisset
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="document_number" class="form-label">Document Number</label>
                                        <input type="text" class="form-control @error('document_number') is-invalid @enderror" name="document_number" id="document_number" value="{{ old('document_number') }}">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="file_number" class="form-label">File Number</label>
                                        <input type="text" class="form-control @error('file_number') is-invalid @enderror" name="file_number" id="file_number" value="{{ old('file_number') }}">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="phone_number" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" id="phone_number" value="{{ old('phone_number') }}">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                                    </div>

                                    <hr>
                                    <input type="submit" class="btn btn-primary" value="Save">

                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
