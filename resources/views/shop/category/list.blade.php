@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="content">
            <h1>Категории</h1>
            <table>
                @foreach ($items as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->title}}</td>
                        <td><a href="{{ route('shop.categories.show', $item->id) }}">Открыть список продуктов</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection