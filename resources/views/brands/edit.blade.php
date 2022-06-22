@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование бренда: "{{ $brand->title }}"</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Редактирование бренда</li>
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
                    <form action="{{ route('brands.update', $brand->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="card card-dark">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <a href="{{ route('brands.index') }}">
                                            <i class="fas fa-caret-square-left"></i>
                                        </a>
                                    </h3>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="brand">Название бренда</label>
                                        <input type="text" name="title" class="form-control" value="{{ $brand->title }}" id="brand" placeholder="Название бренда" required>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-dark">Изменить</button>
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
