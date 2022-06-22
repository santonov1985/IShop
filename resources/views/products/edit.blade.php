@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование продукта</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Редактирование продукта</li>
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
                    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="card card-dark">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <a href="{{ route('products.index') }}">
                                            <i class="fas fa-caret-square-left"></i>
                                            назад
                                        </a>
                                    </h3>
                                </div>

                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Бренд <span class="important">*</span></label>
                                                <select class="form-control" name="brand" required>
                                                    <option hidden>Укажите производителя</option>
                                                    @foreach($brands as $brand)
                                                        <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected':'' }} >{{ $brand->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="product-title">Название продукта <span class="important">*</span></label>
                                                <input class="form-control" value="{{ $product->title }}" type="text" name="title" id="product-title" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="product-model">Модель <span class="important">*</span></label>
                                                <input class="form-control" value="{{ $product->model }}" type="text" name="model" id="product-model" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="product-description">Описание продукта</label>
                                                <textarea class="form-control" rows="3" name="description" id="product-description" style="height: 96px">{{ $product->description ?? '' }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="product-quantity">Количество/ед.<span class="important">*</span></label>
                                                <input class="form-control" value="{{ $product->quantity ?? '' }}" type="text" name="quantity" id="product-quantity" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="product-price">Цена <span class="important">*</span></label>
                                                <input class="form-control" value="{{ $product->price }}" type="number" name="price" id="product-price" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="product-characteristic">Характеристика продукта</label>
                                                <textarea class="form-control" placeholder="{{ $product->characteristic ?? '' }}" rows="7" name="characteristic" id="product-characteristic"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Категория продукта <span class="important">*</span></label>
                                                <select class="form-control" name="category">
                                                    <option hidden>Выберите категорию</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" {{ $category->id ==  $product->category_id ? 'selected' : '' }}>{{ $category->title }}</option>
                                                    @endforeach

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Цвет продукта</label>
                                                <select class="colors" multiple="multiple" name="colors[]" data-placeholder="Выберите цвет" style="width: 100%;" data-select2-id="7" tabindex="-1">
                                                    @foreach($colors as $key => $value)
                                                        <option value="{{ $key }}" @if(in_array($key, $product->colors->pluck('id')->all())) selected @endif>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Публикация продукта на сайте</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="is_published">
                                                    <label class="form-check-label">Опубликовать</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="is_published" checked="">
                                                    <label class="form-check-label">Не публиковать</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">Изображение для миниатюры продукта</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="preview_image" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Выберите изображение миниатюры</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Полное изображение продукта</label>
                                        <div class="custom-file">
                                            <input class="custom-file-input" name="image" type="file" id="product_image">
                                            <label class="custom-file-label" for="product_image">Выберите изображение</label>
                                        </div>
                                    </div>
                                    {{--                                    <div class="form-group">--}}
                                    {{--                                        <label>Наличие товара</label>--}}
                                    {{--                                        <select class="custom-select" name="in_stock" id="product_instock">--}}
                                    {{--                                            <option value="">Все</option>--}}
                                    {{--                                            <option {{ request()->query('in_stock') == 'true' ? 'selected' : '' }} value="true">В наличии</option>--}}
                                    {{--                                            <option {{ request()->query('in_stock') == 'false' ? 'selected' : '' }} value="false">Нет в наличии</option>--}}
                                    {{--                                        </select>--}}
                                    {{--                                    </div>--}}

                                    {{--                                    <div class="form-group">--}}
                                    {{--                                        <label>Цвет продукта</label>--}}
                                    {{--                                        <select class="colors" multiple="multiple" name="colors[]" data-placeholder="Выберите цвет" style="width: 100%;" data-select2-id="7" tabindex="-1">--}}
                                    {{--                                            <option>Красный</option>--}}
                                    {{--                                            <option>Синий</option>--}}
                                    {{--                                            <option>Белый</option>--}}
                                    {{--                                        </select>--}}
                                    {{--                                    </div>--}}

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
