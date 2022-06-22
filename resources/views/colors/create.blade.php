@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Создание цвета</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Создание цвета</li>
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
                    <form action="{{ route('colors.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="card card-dark">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <a href="{{ route('colors.index') }}">
                                            <i class="fas fa-caret-square-left"></i>
                                            назад
                                        </a>
                                    </h3>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="color-name">Название цвета</label>
                                        <input class="form-control" value="{{ old('name') }}" type="text" name="name" id="color-name" placeholder="Синий">
                                    </div>
                                    <div class="form-group">
                                        <label for="color">Цвет</label>
                                        <input class="form-control" value="{{ old('color') }}" type="text" name="color" id="color" placeholder="Формат: #0000FF">
                                        <a href="https://colorscheme.ru/html-colors.html" target="_blank" >Набор цветов с "HEX" кодом</a>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-dark">Создать</button>
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
