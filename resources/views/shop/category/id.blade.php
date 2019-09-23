@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="content">
            <h1>Категория: {{$category->title}}</h1>
            <h2>Продукты</h2>

            @php
                $isLogin = \Illuminate\Support\Facades\Auth::user();
            @endphp

            @if ($products->isNotEmpty())
                <table>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->title}}</td>
                            <td><a href="{{ route('shop.products.show', $product->id) }}">открыть</a></td>
                            @if ($isLogin)
                                <td><a href="{{ route('shop.products.edit', $product->id) }}">Редактировать</a></td>
                            @endif
                        </tr>
                    @endforeach
                </table>
            @else
                Пусто
            @endif

        </div>
    </div>
@endsection