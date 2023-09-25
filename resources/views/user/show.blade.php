@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('User Information') }}</div>

                    <div class="card-body">
                        @if(empty($user))
                            <div class="alert alert-danger" role="alert">
                                There is no such user
                            </div>
                        @else
                            @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session("success") }}
                                </div>
                            @endif
                            {{ Form::open(['route' => ['user.update', $user->username], 'method' => 'put']) }}
                            <div id="deviceType" class="mb-3">
                                <label for="inputProductTitle" class="form-label">Id</label>
                                <h6 id="type" style="margin-left: 10px">{{ $user->id }}</h6>
                                {{Form::hidden('id', $user->id)}}
                            </div>
                            <div id="deviceType" class="mb-3">
                                <label for="inputProductTitle" class="form-label">Username</label>
                                {{ Form::text('username', $user->username, ['class' => 'form-control' . ($errors->has('username') ? ' is-invalid' : null), 'required']) }}
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div id="deviceType" class="mb-3">
                                <label for="inputProductTitle" class="form-label">First Name</label>
                                {{ Form::text('first_name', $user->first_name, ['class' => 'form-control' . ($errors->has('first_name') ? ' is-invalid' : null)]) }}
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div id="deviceType" class="mb-3">
                                <label for="inputProductTitle" class="form-label">Last Name</label>
                                {{ Form::text('last_name', $user->last_name, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : null)]) }}
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div id="deviceType" class="mb-3">
                                <label for="inputProductTitle" class="form-label">Phone</label>
                                {{ Form::text('phone', $user->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : null)]) }}
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div id="deviceType" class="mb-3">
                                <label for="inputProductTitle" class="form-label">Email</label>
                                {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : null), 'required']) }}
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                {{ Form::label('password', 'Password', ['class' => 'form-label']) }}
                                {{ Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : null)]) }}
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div>
                                {{ Form::submit('Update', ['class' => 'btn btn-success']) }}
                            </div>
                            {{ Form::close() }}
                            {{ Form::open(['route' => ['user.destroy', $user->username], 'method' => 'delete']) }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                            {{ Form::close() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
