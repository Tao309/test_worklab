@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="content">
            <h1>Категория: {{$category->title}}</h1>
            <h2>Продукты</h2>

            @if ($products->isNotEmpty())
                <table>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->title}}</td>
                        </tr>
                    @endforeach
                </table>
            @else
                Пусто
            @endif

        </div>
    </div>
@endsection