@extends('layouts.app')
@section('content')

    @php
        $isLogin = \Illuminate\Support\Facades\Auth::user();
    @endphp

    <div class="container">
        <div class="content">
            <h1>Продукты</h1>
            @if($isLogin)
                <a href="{{route('shop.products.create')}}">Добавить продукт</a>
            @endif

            <table>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td><a href="{{ route('shop.products.show', $product->id) }}">Открыть</a></td>
                    @if ($isLogin)
                        <td><a href="{{ route('shop.products.edit', $product->id) }}">Редактировать</a></td>
                    @endif
                </tr>
            @endforeach
            </table>
        </div>
    </div>
@endsection