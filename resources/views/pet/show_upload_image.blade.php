@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">pet upload image</div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session("success") }}
                            </div>
                        @endif
                        {{ Form::open(['route' => ['pet.upload-image', $pet->id], 'method' => 'post', 'files' => true]) }}
                        <div id="deviceType" class="mb-3">
                            <label for="inputProductTitle" class="form-label">Pet name</label>
                            <h6 id="type" style="margin-left: 10px">{{ $pet->name }}</h6>
                            {{Form::hidden('id', $pet->id)}}
                        </div>
                        <div id="deviceType" class="mb-3">
                            <label for="inputProductTitle" class="form-label">Upload Image</label>
                            {{ Form::file("photo", ['class' => 'form-control' . ($errors->has('photo') ? ' is-invalid' : null), 'required']) }}
                            @error('photo')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            {{ Form::submit('Add', ['class' => 'btn btn-success']) }}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
