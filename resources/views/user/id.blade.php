@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="content">
            <h1>Пользователь {{$user->name}}</h1>

            <table>
                <tr>
                    <td>Email:</td>
                    <td>{{$user->email}}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection