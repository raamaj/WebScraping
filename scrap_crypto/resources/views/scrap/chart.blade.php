@extends('layouts.master')
@section('content')
    <div class="container">
        <select class="form-control col-sm-2 btn btn-primary" id="crypto">
            <option value="BTC" selected>BTC</option>
            <option value="BCH">BCH</option>
            <option value="LTC">LTC</option>
          </select>
    </div>
    <div class="card p-5" style="height:350px; min-height:250px">
        <canvas class="mt-5" id="btc-chart" style="height:250px; min-height:250px"></canvas>
    </div>
@endsection