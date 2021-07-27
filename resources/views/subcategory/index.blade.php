@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>{{ __('List of SubCategorys') }}</h2></div>
                    <div class="card-body">
                        @include('custom.message')
                            @can('haveaccess','subcategory.create')
                            <a href="{{ route('subcategory.create') }}" class="btn btn-sm btn-primary float-right">Create</a>
                            @endcan
                            <br><br>

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                    <th colspan="3"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subcategorys as $subcategory)
                                    <tr>
                                        <th scope="row">{{ $subcategory->id }}</th>
                                        <td>{{ $subcategory->name }}</td>
                                        <td>{{ $subcategory->category_id }}</td>

                                        <td>
                                            @can('haveaccess','subcategory.destroy')
                                            <form action="{{ route('subcategory.destroy',$subcategory->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
