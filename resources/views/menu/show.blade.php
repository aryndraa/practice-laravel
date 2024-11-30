@extends('layout')

@section('content')
    <h1>{{ $menu->name }}</h1>
    <p>Price: {{ number_format($menu->price, 0, ',', '.') }} IDR</p>

    <h2>Additional Items:</h2>
    @if($menu->additional->isEmpty())
        <p>No additional items available.</p>
    @else
        <ul>
            @foreach($menu->additional as $additional)
                <li>
                    <p>
                        {{ $additional->name }}
                    </p>
                    <p>Variant</p>
                    <ul>
                        @foreach($additional->variant as $variant)
                            <li>{{ $variant->name }}</li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
