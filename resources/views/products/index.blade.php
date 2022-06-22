@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Продукты</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Продукты</li>
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
                            <a class="btn btn-dark btn-sm" href="{{ route('products.create') }}" title="Создать">
                                <i class="fas fa-plus-square mr-2"></i> Добавить
                            </a>
                        </div>

                        @if($products->isEmpty())
                            <p class="mt-2 text-gray">Данный раздел пуст...</p>
                        @else
                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Категория</th>
                                    <th>Наименование</th>
                                    <th>Бренд</th>
                                    <th>Модель</th>
                                    <th>Кол-во</th>
                                    <th>Цена</th>
                                    <th>Наличие</th>
                                    <th>Цвет</th>
                                    <th>Дата публикации</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id ?? '' }}</td>
                                    <td>{{ $product->category->title ?? '' }}</td>
                                    <td>{{ $product->title ?? '' }}</td>
                                    <td>{{ $product->brand->title ?? '' }}</td>
                                    <td>{{ $product->model ?? '' }}</td>
                                    <td>{{ $product->quantity ?? '0' }}</td>
                                    <td>{{ $product->price ?? '00.00' }}</td>
                                    <td>{{ $product->in_stock == 'true' ? 'В наличии' : 'Нет в наличии' }}</td>
                                    <td class="d-flex align-items-center">
                                        @foreach($product->colors as $color)
                                        <div class="mr-2" style=" border: 1px solid black; width: 16px; height: 16px; background:{{ $color->color ?? ''  }}"></div>
                                        @endforeach
                                    </td>
                                    <td>{{ date_format(date_create($product->created_at), 'd-m-Y') }}</td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <a class="btn btn-dark btn-sm" href="{{ route('products.edit', $product->id) }}" title="Редактировать">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a class="btn btn-dark btn-sm btn-delete" href="{{ route('products.delete', $product->id) }}" title="Удалить">
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
