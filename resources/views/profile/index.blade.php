@extends('layout.main')
@section('content')
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header col-lg-12">
                <a class="navbar-brand" href="/">Здравствуйте, {{ $user->name }}</a>
                <a id="logout" class="navbar-brand" href="/logout">Выйти</a>
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
            <table id="tasksList" class="table table-hover">
                <thead>
                    <tr>
                        <th>Наименование</th>
                        <th>Описание</th>
                        <th>Дата создания</th>
                        <th>Дата обновления</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->created_at }}</td>
                        <td>{{ $task->updated_at }}</td>
                    </tr>
                    @empty
                        <tr>
                            <td>У вас еще нет заданий</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <button id="addUser" type="button" class="btn btn-primary">Добавить задачу</button>
        </div>

    </div><!-- /.container -->
    <div id="form_modal" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Добавление задачи</h4>
                </div>
                <div class="modal-body">
                    <form id="addTask">
                        <div class="form-group">
                            <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="Type task title" name="title" value="">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="descr" aria-describedby="descr" placeholder="Type task description" name="descr" value="">
                        </div>
                        <input id="token" type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <input id="user_id" type="hidden" name="user_id" value="{{ $user->id }}"/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="saveUser" type="button" class="btn btn-primary">Добавить</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection