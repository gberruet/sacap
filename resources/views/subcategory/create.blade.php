@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Create Subsubcategory</h2></div>

                    <div class="card-body">
                        @include('custom.message')

                            <form action="{{ route('subcategory.store') }}" method="POST">
                                @csrf
                                <div class="container">
                                    <h3>Required Data</h3>
                                    <div class="mb-3">
                                        <label for="name" class="col-form-label">Subcategory Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Subcategory Name" value="{{ old('name') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                                            @if(empty(old('category_id')))
                                                <option value="">Select</option>
                                            @endif
                                            @foreach($categories as $category)
                                                @isset($category->id)
                                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @endisset
                                            @endforeach
                                        </select>
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
