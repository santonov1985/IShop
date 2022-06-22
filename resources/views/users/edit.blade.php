@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование пользователя: "{{ $user->name }} {{ $user->surname }}"</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Редактирование пользователя</li>
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
                    <form action="{{ route('users.update', $user->id) }}" method="post">
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
                                                <input class="form-control" value="{{ $user->name }}" type="text" name="name" id="name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="surname">Фамилия:</label>
                                                <input class="form-control" value="{{ $user->surname }}" type="text" name="surname" id="surname">
                                            </div>
                                            <div class="form-group">
                                                <label for="age">Возраст:</label>
                                                <input class="form-control" value="{{ $user->age }}" type="number" name="age" id="age" min="16">
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Пол:</label>
                                                <select class="form-control" name="gender" id="gender">
                                                    <option value="" hidden>Выберите пол</option>
                                                    <option {{ $user->gender == 1 || old('gender') ? 'selected' : '' }} value="1">Мужской</option>
                                                    <option {{ $user->gender == 2 || old('gender') ? 'selected' : '' }} value="2">Женский</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-6">
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input class="form-control" value="{{ $user->email }}" type="email" name="email" id="email" required>
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
                                    <button type="submit" class="btn btn-dark">Сохранить</button>
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
