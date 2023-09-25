@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">pet info</div>
                    <div class="card-body">
                        @if(empty($pet))
                            <div class="alert alert-danger" role="alert">
                                There is no such pet
                            </div>
                        @else
                            @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session("success") }}
                                </div>
                            @endif
                            {{ Form::open(['route' => ['pet.update', $pet->id], 'method' => 'post']) }}
                                    <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Id</label>
                                    <h6 id="type" style="margin-left: 10px">{{ $pet->id }}</h6>
                                    {{Form::hidden('id', $pet->id)}}
                                </div>
                                <div id="deviceType" class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Name</label>
                                    {{ Form::text('name', $pet->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : null)]) }}
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Status</label>
                                    {{ Form::select('status', ['available' => 'available','pending' => 'pending','sold' => 'sold'], $pet->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : null), 'required']) }}
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
                                            <option value="{{ $tags->id }}" @if($pet->tag_id == $tags->id) selected @endif>{{ $tags->name }}</option>
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
                                            <option value="{{ $categories->id }}" @if($pet->category_id == $categories->id) selected @endif>{{ $categories->name }}</option>
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
                            {{ Form::open(['route' => ['pet.destroy', $pet->id], 'method' => 'delete']) }}
                                <button type="submit" class="btn btn-danger">Delete</button>
                            {{ Form::close() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
