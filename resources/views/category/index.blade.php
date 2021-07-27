@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>{{ __('List of Categorys') }}</h2></div>
                    <div class="card-body">
                        @include('custom.message')
                            @can('haveaccess','category.create')
                            <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary float-right">Create</a>
                            @endcan
                            <br><br>

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Name</th>
                                    <th colspan="3"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categorys as $category)
                                    <tr>
                                        <th scope="row">{{ $category->id }}</th>
                                        <td>{{ $category->code }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>@can('haveaccess','category.show')
                                                <a href="{{ route('category.show',$category->id) }}" class="btn btn-sm btn-info">Show</a>
                                            @endcan
                                        </td>
                                        <td>@can('haveaccess','category.edit')
                                                <a href="{{ route('category.edit',$category->id) }}" class="btn btn-sm btn-success">Edit</a>
                                            @endcan
                                        </td>
                                        <td>
                                            @can('haveaccess','category.destroy')
                                            <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Desea eliminar... ?')">Delete</button>
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
