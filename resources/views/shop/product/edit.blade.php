@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="content">

            @php
            /**  @var \App\models\Product $product */
            @endphp

            @if($product->exists)
                <h1>Продукт: {{$product->title}}</h1>
                <form method="POST" action="{{ route('shop.products.update', $product->id) }}">
                @method('PATCH')
            @else
                <h1>Добавить продукт</h1>
                <form method="POST" action="{{ route('shop.products.store') }}">
            @endif
                @csrf

                <table>
                    <tr>
                        <td>Наименование:</td>
                        <td><input type="text" value="{{$product->title}}" name="title" id="title"/></td>
                    </tr>
                    <tr>
                        <td>Категория:</td>
                        <td>
                            <select name="category_id" id="category_id">
                                @if(!$product->exists)
                                    <option value="0" disabled selected>Выбрать категорию</option>
                                @endif

                                @foreach($categories as $category)
                                    @php
                                        $isSelected = ($product->exists && $category->id == $product->category->id);
                                        $selected = $isSelected ? 'selected' : '';
                                    @endphp

                                    <option value="{{$category->id}}" {{$selected}}>{{$category->title}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit">
                                @if($product->exists)
                                    Сохранить
                                @else
                                    Добавить
                                @endif
                            </button>
                        </td>
                    </tr>
                </table>

            </form>

            @if($product->exists)
                <br/>
                <form method="POST" action="{{ route('shop.products.destroy', $product->id) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Удалить</button>
                </form>
            @endif
        </div>
    </div>
@endsection