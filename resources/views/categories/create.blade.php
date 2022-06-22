@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Создание категории</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Создание категории</li>
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
                    <form action="{{ route('categories.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="card card-dark">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <a href="{{ route('categories.index') }}">
                                            <i class="fas fa-caret-square-left"></i>
                                        </a>
                                    </h3>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="category">Название категории</label>
                                        <input type="text" name="title" class="form-control" id="category" placeholder="Название категории">
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
