@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>View Role</h2></div>

                    <div class="card-body">
                        @include('custom.message')

                            <form action="{{ route('role.update', $role->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="container">
                                    <h3>Required Data</h3>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ old('name', $role->name) }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug" value="{{ old('slug', $role->slug) }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description" readonly>{{ old('description', $role->description) }}</textarea>
                                    </div>
                                    <hr>
                                    <h3>Full Access</h3>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="full-access" id="fullaccessyes" value="yes"
                                           @if ($role['full-access'] == "yes")
                                            checked
                                           @elseif (old('full-access') == "yes")
                                            checked
                                            @endif
                                        disabled>
                                        <label class="form-check-label" for="fullaccessyes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="full-access" id="fullaccessno" value="no"
                                               @if ($role['full-access'] == "no")
                                               checked
                                               @elseif (old('full-access') == "no")
                                               checked
                                            @endif
                                        disabled>
                                        <label class="form-check-label" for="fullaccessno">No</label>
                                    </div>
                                    <hr>
                                    <h3>Permission List</h3>
                                    @foreach($permissions as $permission)
                                    <div class="mb-3 form-check">
                                        <input type="checkbox"
                                               class="form-check-input"
                                               id="permission_{{$permission->id}}"
                                               value="{{$permission->id}}"
                                               name="permission[]"
                                               @if (is_array(old('permission')) && in_array("$permission->id", old('permission')))
                                                    checked
                                               @elseif (is_array($permission_role) && in_array("$permission->id", $permission_role))
                                                   checked
                                               @endif
                                        disabled>
                                        <label class="form-check-label" for="permission_{{$permission->id}}">
                                            {{ $permission->id }}
                                            -
                                            {{ $permission->name }}
                                            <em>({{ $permission->description }})</em>
                                        </label>
                                    </div>
                                    @endforeach
                                    <hr>
                                    <a href="{{ route('role.edit', $role->id) }}" class="btn btn-success">Edit</a>
                                    <a href="{{ route('role.index') }}" class="btn btn-danger">Back</a>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
