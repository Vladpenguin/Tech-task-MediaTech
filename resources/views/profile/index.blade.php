@extends('layout.main')
@section('content')
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Здравствуйте, {{ $user->name }}</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    {{--<li class="active"><a href="#">Home</a></li>--}}
                    {{--<li><a href="#about">About</a></li>--}}
                    {{--<li><a href="#contact">Contact</a></li>--}}
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="container">

        <div class="starter-template">
            <h1>Ваши текущие задачи:</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Наименование</th>
                        <th>Описание</th>
                        <th>Дата создания</th>
                        <th>Дата обновления</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    @foreach($tasks as $task)
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->createt_at }}</td>
                        <td>{{ $task->updated_at }}</td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>

    </div><!-- /.container -->
@endsection