@extends('layout')

@section('content')
    <div>
        <h1>Data Menu</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
                @php
                    $no = 1
                @endphp
                @foreach($menus as $menu)
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{$menu->name}}</td>
                        <td>{{$menu->price}}</td>
                    </tr>
                    @php
                        $no++
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


