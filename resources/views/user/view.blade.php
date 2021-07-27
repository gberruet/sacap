@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>View User</h2></div>

                    <div class="card-body">
                        @include('custom.message')

                            <form action="{{ route('user.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="container">
                                    <h3>Required Data</h3>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ old('name', $user->name) }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="email" id="email" placeholder="email" value="{{ old('email', $user->email) }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-control" name="roles" id="roles" disabled>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}"
                                                        @isset($user->roles[0]->name)
                                                        @if($role->name == $user->roles[0]->name)
                                                        selected
                                                    @endif
                                                    @endisset
                                                >{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <hr>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success">Edit</a>
                                    <a href="{{ route('user.index') }}" class="btn btn-danger">Back</a>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
