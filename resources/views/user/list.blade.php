@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="content">
            <h1>Пользователи</h1>
            <table>
                @php
                    $isLogin = \Illuminate\Support\Facades\Auth::user();
                @endphp

                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><a href="{{ route('users.show', $user->id) }}">Открыть</a></td>
                        @if ($isLogin)
                            <td><a href="{{ route('users.edit', $user->id) }}">Редактировать</a></td>
                        @endif
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection