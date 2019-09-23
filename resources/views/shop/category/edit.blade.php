@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="content">

            @php
                /**  @var \App\models\ProductCategory $category */
            @endphp

            @if($category->exists)
                <h1>Категория: {{$category->title}}</h1>
                <form method="POST" action="{{ route('shop.categories.update', $category->id) }}">
                @method('PATCH')
            @else
                <h1>Добавить категорию</h1>
                <form method="POST" action="{{ route('shop.categories.store') }}">
            @endif

             @csrf
                    <table>
                        <tr>
                            <td>Наименование:</td>
                            <td><input type="text" value="{{$category->title}}" name="title" id="title"/></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit">
                                    @if($category->exists)
                                        Сохранить
                                    @else
                                        Добавить
                                    @endif
                                </button>
                            </td>
                        </tr>
                    </table>

                </form>

                @if($category->exists)
                    <br/>
                    <form method="POST" action="{{ route('shop.categories.destroy', $category->id) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Удалить</button>
                    </form>
                @endif
        </div>
    </div>
@endsection