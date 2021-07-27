@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2>List of Students</h2></div>
                    <div class="card-body">
                        @include('custom.message')
                        <a href="{{ route('student.create') }}" class="btn btn-primary float-right">Create</a>
                        <br><br>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Surname</th>
                                    <th scope="col">Typo of Student</th>
                                    <th scope="col">Nationality</th>
                                    <th scope="col">Document Type</th>
                                    <th scope="col">Document Number</th>
                                    <th scope="col">File</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Email</th>
                                    <th colspan="3"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <th scope="row">{{ $student->id }}</th>
                                        <td>{{ $student->first_name }}</td>
                                        <td>{{ $student->last_name }}</td>
                                        <td>{{ $student->studentType->name }}</td>
                                        <td>{{ $student->nationality->name }}</td>
                                        <td>{{ $student->documentType->name }}</td>
                                        <td>{{ $student->document_number }}</td>
                                        <td>{{ $student->file_number }}</td>
                                        <td>{{ $student->phone_number }}</td>
                                        <td>{{ $student->email }}</td>

                                        <td>@can('haveaccess','student.show')
                                                <a href="{{ route('student.show',$student->id) }}" class="btn btn-sm btn-info">Show</a>
                                            @endcan
                                        </td>
                                        <td>@can('haveaccess','student.edit')
                                                <a href="{{ route('student.edit',$student->id) }}" class="btn btn-sm btn-success">Edit</a>
                                            @endcan
                                        </td>
                                        <td>
                                            @can('haveaccess','student.destroy')
                                            <form action="{{ route('student.destroy',$student->id) }}" method="POST">
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
                            {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
