@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Категории</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Категории</li>
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
                <div class="col-12">
                    <div class="card p-3">
                        <div class="card-header p-0 mb-3 border-0">
                            <a class="btn btn-dark btn-sm" href="{{ route('categories.create') }}" title="Создать">
                                <i class="fas fa-plus-square mr-2"></i> Добавить
                            </a>
                        </div>

                        @if($categories->isEmpty())
                            <p class="mt-2 text-gray">Данный раздел пуст...</p>
                        @else
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Наименование</th>
                                    <th>Дата создания</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id ?? '' }}</td>
                                    <td>{{ $category->title ?? '' }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <a class="btn btn-dark btn-sm" href="{{ route('categories.edit', $category->id) }}" title="Редактировать">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a class="btn btn-dark btn-sm" href="{{ route('categories.delete', $category->id) }}" title="Удалить">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
