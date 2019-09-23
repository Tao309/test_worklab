@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="content">
            @php
                $isLogin = \Illuminate\Support\Facades\Auth::user();
            @endphp

            <h1>Категории</h1>

            @if($isLogin)
                <a href="{{route('shop.categories.create')}}">Добавить категорию</a>
            @endif


            <table>
                @foreach ($items as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->title}}</td>
                        <td><a href="{{ route('shop.categories.show', $item->id) }}">Открыть список продуктов</a></td>
                        @if ($isLogin)
                            <td><a href="{{ route('shop.categories.edit', $item->id) }}">Редактировать</a></td>
                        @endif
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection