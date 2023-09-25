@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">pet info</div>
                    <div class="card-body">
                        @if($order)
                            <div class="mb-3">
                                <label for="inputProductTitle" class="form-label">Id</label>
                                <h6 id="type" style="margin-left: 10px">{{ $order->id }}</h6>
                            </div>
                            <div class="mb-3">
                                <label for="inputProductTitle" class="form-label">Pet Name</label>
                                <h6 id="type" style="margin-left: 10px">{{ $order->pet->name }}</h6>
                            </div>
                            <div class="mb-3">
                                <label for="inputProductTitle" class="form-label">Quantity</label>
                                <h6 id="type" style="margin-left: 10px">{{ $order->quantity }}</h6>
                            </div>
                            <div class="mb-3">
                                <label for="inputProductTitle" class="form-label">Ship date</label>
                                <h6 id="type" style="margin-left: 10px">{{ $order->ship_date }}</h6>
                            </div>
                            <div class="mb-3">
                                <label for="inputProductTitle" class="form-label">Status</label>
                                <h6 id="type" style="margin-left: 10px">{{ $order->status }}</h6>
                            </div>
                            <div class="mb-3">
                                <label for="inputProductTitle" class="form-label">Complete</label>
                                <h6 id="type" style="margin-left: 10px">@if ($order->complete == '1') Complete @else Not Complete @endif</h6>
                            </div>
                            {{ Form::open(['route' => ['store.destroy', $order->id], 'method' => 'delete']) }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                            {{ Form::close() }}
                        @else
                            <div class="alert alert-danger" role="alert">
                                There is no such order
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
