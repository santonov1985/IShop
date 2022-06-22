<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Brand\Brand;
use App\Models\Category\Category;
use App\Models\Color\Color;
use App\Models\Product\Product;
use App\Models\Product\ProductRepository;
use App\Models\Product\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->with('category','colors', 'brand')
            ->get();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $colors = Color::all();

        return view('products.create', compact(
            'brands',
            'categories',
            'colors'
        ));
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $previewImage = $this->pictureCheck($request->file('preview_image'));
        $image = $this->pictureCheck($request->file('image'));

        try {

            (new ProductRepository)->getCreate(
                $request->input('brand'),
                $request->input('title'),
                $request->input('quantity'),
                $request->input('price'),
                $request->input('category'),
                $request->input('model'),
                $previewImage,
                $image,
                $request->input('description'),
                $request->input('characteristic'),
                $request->input('colors'),
                $request->input('is_published'),

            );

            return redirect()
                ->route('products.index')
                ->with('message', 'Добавлено!');

        } catch (\Throwable $err) {
            Log::error("Product: create Product error. " . $err->getMessage() . $err->getTraceAsString());
            return redirect()->back()->withErrors(['Ошибка создания!'])->withInput();
        }

    }

    public function edit(int $id)
    {
        $product = Product::query()
            ->findOrFail($id);

        $brands = Brand::all();
        $categories = Category::all();
        $colors = Color::query()->pluck('name', 'id')->all();

        return view('products.edit', compact(
            'product',
            'brands',
            'categories',
            'colors'
        ));
    }

    public function update(
        int $id,
        Request $request
    )
    {
        $product = Product::query()->findOrFail($id);

        $previewImage = $this->pictureCheck($request->file('preview_image'));
        $image = $this->pictureCheck($request->file('image'));

        try {

            (new ProductRepository)->getUpdate(
                $product,
                $request->input('brand'),
                $request->input('title'),
                $request->input('quantity'),
                $request->input('price'),
                $request->input('category'),
                $request->input('model'),
                $previewImage,
                $image,
                $request->input('description'),
                $request->input('characteristic'),
                $request->input('colors'),
                $request->input('is_published'),

            );

            return redirect()
                ->route('products.index')
                ->with('message', 'Изменено!');

        } catch (\Throwable $err) {
            Log::error("Product: update Product error. " . $err->getMessage() . $err->getTraceAsString());
            return redirect()->back()->withErrors(['Ошибка изменения!'])->withInput();
        }


    }

    public function delete($id)
    {
        $product = Product::query()->findOrFail($id);
        $product->colors()->detach();
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('message', "Запись $id: Удалена!");

    }

    public function pictureCheck($file): ?string
    {
        if ($file !== null) {
            return (new ProductService)->uploadImage($file);
        }

        return null;
    }

}
