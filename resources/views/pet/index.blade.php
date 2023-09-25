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
                        {{ Form::open(['route' => ['pet.store'], 'method' => 'post']) }}
                        <div id="deviceType" class="mb-3">
                            <label for="inputProductTitle" class="form-label">Name</label>
                            {{ Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : null)]) }}
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="mb-3">
                                <label for="inputProductTitle" class="form-label">Status</label>
                                {{ Form::select('status', ['available' => 'available','pending' => 'pending','sold' => 'sold'], null, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : null), 'required']) }}
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="inputProductTitle" class="form-label">Tag</label>
                                <select name="tag_id" class="form-control">
                                    @foreach($tag as $tags)
                                        <option value="{{ $tags->id }}">{{ $tags->name }}</option>
                                    @endforeach
                                </select>
                                @error('tag_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="inputProductTitle" class="form-label">Category</label>
                                <select name="category_id" class="form-control">
                                    @foreach($category as $categories)
                                        <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div>
                                {{ Form::submit('Update', ['class' => 'btn btn-success']) }}
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
