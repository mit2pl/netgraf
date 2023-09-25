@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">show by status</div>
                    <div class="card-body">
                        {{Form::open(['method' => 'get'])}}
                            <div class="mb-3">
                                <label for="inputProductTitle" class="form-label">Status</label>
                                <select class="form-control" name="status">
                                    <option value="available">available</option>
                                    <option value="pending">pending</option>
                                    <option value="sold">sold</option>
                                </select>
{{--                                {{ Form::select('status', ['available' => 'available','pending' => 'pending','sold' => 'sold'], $pet->status, ['class' => 'form-control', 'required']) }}--}}
                            </div>
                        <div>
                            {{ Form::submit('Show', ['class' => 'btn btn-success']) }}
                        </div>
                        {{ Form::close() }}
                        <table class="form-control">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Tag Name</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            @forelse($pet as $pets)
                                <tbody>
                                    <img>
                                        <td>{{ $pets->id }}</td>
                                        <td>{{ $pets->Category->name }}</td>
                                        <td>{{ $pets->name }}</td>
                                        <td><img src="{{ asset($pets->photo_urls) }}" width="100" height="100"></td>
                                        <td>{{ $pets->Tag->name }}</td>
                                        <td>{{ $pets->status }}</td>
                                    </tr>
                                </tbody>
                            @empty
                                <div class="alert alert-danger mt-5" role="alert">
                                    No such pet with status: {{ app('request')->input('status') }}
                                </div>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
