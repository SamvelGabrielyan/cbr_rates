@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>English Name</th>
                <th>Alphabetic Code</th>
                <th>Digit Code</th>
                <th>Rate</th>
            </tr>
            </thead>
            <tbody>
            @foreach($currencies as $currency)
                <tr>
                    <td>{{$currency->id}}</td>
                    <td>{{$currency->name}}</td>
                    <td>{{$currency->english_name}}</td>
                    <td>{{$currency->alphabetic_code}}</td>
                    <td>{{$currency->digit_code}}</td>
                    <td>{{$currency->rate}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
