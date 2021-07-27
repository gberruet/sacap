@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>View Category</h2></div>

                    <div class="card-body">
                        @include('custom.message')

                            <form action="{{ route('category.update', $category->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="container">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Category Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Category Name" value="{{ old('name', $category->name) }}" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="code" class="col-form-label">Category Code</label>
                                        <input type="text" class="form-control" name="code" id="code" placeholder="Category Code" value="{{ old('code', $category->code) }}" readonly>
                                    </div>

                                    <hr>
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-success">Edit</a>
                                    <a href="{{ route('category.index') }}" class="btn btn-danger">Back</a>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
