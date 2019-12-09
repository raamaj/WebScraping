@extends('layouts.master')
@section('content')
    <h2>Informasi 10 Mata Uang Kripto Terpopuler</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Simbol</th>
                <th>Harga (IDR)</th>
                <th>Market Cap</th>
                <th>Vol. (24 Jam)</th>
                <th>Total Vol.</th>
                <th>Prb. (24 Jam)</th>
                <th>Prb. (7 Hari)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $items)
            <tr>
                <td>{{$items['name']}}</td>
                <td>{{$items['symbol']}}</td>
                <td>{{$items['price']}}</td>
                <td>Rp. {{$items['marcap']}}T</td>
                <td>Rp. {{$items['vol24h']}}T</td>
                <td>{{$items['voltot']}}</td>
                <td>{{$items['chg24h']}}</td>
                <td>{{$items['chg7d']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>     
@endsection