@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Edit Category</h2></div>

                    <div class="card-body">
                        @include('custom.message')

                            <form action="{{ route('category.update', $category->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="container">
                                    <h3>Required Data</h3>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Category Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ old('name', $category->name) }}">
                                    </div>

                                    <hr>
                                    <input type="submit" class="btn btn-primary" value="Save">
                                    <a href="{{ route('category.index') }}" class="btn btn-danger">Back</a>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
