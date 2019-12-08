@extends('layouts.master')
@section('content')
    <h2>Trading Dulu Gan</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Symbol</th>
                <th>Price (USD)</th>
                <th>Market Cap</th>
                <th>Volume (24H)</th>
                <th>Change (24H)</th>
                <th>Change (7D)</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $items)
            <tr>
                <td>{{$items['name']}}</td>
                <td>{{$items['symbol']}}</td>
                <td>${{$items['price']}}</td>
                <td>${{$items['marcap']}}B</td>
                <td>${{$items['vol24h']}}B</td>
                <td>{{$items['chg24h']}}</td>
                <td>{{$items['chg7d']}}</td>
                <td>{{$items['date']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>     
@endsection