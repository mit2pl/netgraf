@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add user</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert"> {{ session('success') }}</div>
                        @endif
                            {{ Form::open(['route' => 'user.store', 'method' => 'post']) }}
                        <div class="mb-2">
                            {{ Form::label('username', 'Username', ['class' => 'form-label']) }}
                            {{ Form::text('username', null, ['class' => 'form-control' . ($errors->has('username') ? ' is-invalid' : null), 'required']) }}
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            {{ Form::label('email', 'Email', ['class' => 'form-label']) }}
                            {{ Form::text('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : null), 'required']) }}
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            {{ Form::label('first_name', 'First Name', ['class' => 'form-label']) }}
                            {{ Form::text('first_name', null, ['class' => 'form-control' . ($errors->has('first_name') ? ' is-invalid' : null)]) }}
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            {{ Form::label('last_name', 'Last Name', ['class' => 'form-label']) }}
                            {{ Form::text('last_name', null, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : null)]) }}
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            {{ Form::label('phone', 'Phone', ['class' => 'form-label']) }}
                            {{ Form::text('phone', null, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : null)]) }}
                            @error('phone')
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
                        {{ Form::submit('Add', ['class' => 'btn btn-success']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
