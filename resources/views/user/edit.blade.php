@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="content">
            <h1>Редактировать {{$user->name}}</h1>

            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @method('PATCH')
                @csrf

            <table>
                <tr>
                    <td>Имя:</td>
                    <td><input type="text" value="{{$user->name}}" name="name" id="name"/></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" value="{{$user->email}}" name="email" id="email"/></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit">Сохранить</button></td>
                </tr>
            </table>

            </form>
        </div>
    </div>
@endsection