@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Создание пользователя</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Создание пользователя</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-12 col-12">
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="card card-dark">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <a href="{{ route('users.index') }}">
                                            <i class="fas fa-caret-square-left"></i>
                                        </a>
                                    </h3>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-6">
                                            <div class="form-group">
                                                <label for="name">Имя:</label>
                                                <input class="form-control" value="{{ old('name') }}" type="text" name="name" id="name" placeholder="Иван">
                                            </div>
                                            <div class="form-group">
                                                <label for="surname">Фамилия:</label>
                                                <input class="form-control" value="{{ old('surname') }}" type="text" name="surname" id="surname" placeholder="Иванов">
                                            </div>
                                            <div class="form-group">
                                                <label for="age">Возраст:</label>
                                                <input class="form-control" value="{{ old('age') }}" type="number" name="age" id="age" min="16" placeholder="18">
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Пол:</label>
                                                <select class="form-control" name="gender" id="gender">
                                                    <option value="" hidden>Выберите пол</option>
                                                    <option {{ old('gender') == 1 ? 'selected' : '' }} value="1">Мужской</option>
                                                    <option {{ old('gender') == 2 ? 'selected' : '' }} value="2">Женский</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-6">
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input class="form-control" value="{{ old('email') }}" type="email" name="email" id="email" placeholder="i.ivan@domain.ru">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Пароль:</label>
                                                <input class="form-control" type="password" name="password" id="password">
                                            </div>
                                            <div class="form-group">
                                                <label for="password_confirmation">Подтверждение пароля:</label>
                                                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-dark">Создать</button>
                                    <a class="btn btn-dark" href="{{ route('users.index') }}">Отменить</a>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
