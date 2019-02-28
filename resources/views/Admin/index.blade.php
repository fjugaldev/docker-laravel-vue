@extends('base')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        {{--<div class="btn-toolbar mb-2 mb-md-0">--}}
            {{--<div class="btn-group mr-2">--}}
                {{--<button class="btn btn-sm btn-outline-secondary">Share</button>--}}
                {{--<button class="btn btn-sm btn-outline-secondary">Export</button>--}}
            {{--</div>--}}
            {{--<button class="btn btn-sm btn-outline-secondary dropdown-toggle">--}}
                {{--<span data-feather="calendar"></span>--}}
                {{--This week--}}
            {{--</button>--}}
        {{--</div>--}}
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h5 class="card-title">Open Orders</h5>
                    <h1 class="card-text">{{ $openOrders }}</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card bg-success text-light">
                <div class="card-body">
                    <h5 class="card-title">Completed Orders</h5>
                    <h1 class="card-text">{{ $completedOrders }}</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card bg-dark text-light">
                <div class="card-body">
                    <h5 class="card-title">Drivers</h5>
                    <h1 class="card-text">{{ $drivers }}</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card bg-light text-dark">
                <div class="card-body">
                    <h5 class="card-title">Customers</h5>
                    <h1 class="card-text">{{ $customers }}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection