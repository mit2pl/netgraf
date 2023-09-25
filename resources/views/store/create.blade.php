@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">pet info</div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session("success") }}
                            </div>
                        @endif
                        {{ Form::open(['route' => ['store.store'], 'method' => 'post']) }}
                        <div id="deviceType" class="mb-3">
                            <label for="inputProductTitle" class="form-label">Name</label>
                            <select name="pet_id" class="form-control">
                                @foreach($pet as $pets)
                                    <option value="{{ $pets->id }}">{{ $pets->name }}</option>
                                @endforeach
                            </select>
                            @error('pet_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="inputProductTitle" class="form-label">Quantity</label>
                            {{ Form::text('quantity', null, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : null)]) }}
                            @error('quantity')
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
