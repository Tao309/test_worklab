@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="content">
            <h1>Продукт: {{$product->title}}</h1>

            <table>
                <tr>
                    <td>Категория:</td>
                    <td>
                        {{$product->category->title}}

                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection