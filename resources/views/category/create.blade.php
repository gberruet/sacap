@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Create Category</h2></div>

                    <div class="card-body">
                        @include('custom.message')

                            <form action="{{ route('category.store') }}" method="POST">
                                @csrf
                                <div class="container">
                                    <div class="mb-3">
                                        <label for="name" class="col-form-label">Category Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Category Name" value="{{ old('name') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="code" class="col-form-label">Category Code</label>
                                        <input type="text" class="form-control" name="code" id="code" placeholder="Category Code" value="{{ old('code') }}">
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
