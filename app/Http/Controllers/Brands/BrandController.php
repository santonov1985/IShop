<?php

namespace App\Http\Controllers\Brands;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\StoreRequest;
use App\Http\Requests\Brand\UpdateRequest;
use App\Models\Brand\Brand;
use App\Models\Brand\BrandRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;
use Throwable;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();

        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        return view('brands.create');
    }

    /**
     * @throws Throwable
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        try {

            (new BrandRepository)->getCreate($request->input('title'));

            return redirect()->route('brands.index')->with('message', 'Добавлено!');

        } catch (Throwable $err) {
            Log::error("Brand: create brand error. " . $err->getMessage());
            return redirect()->back()->withErrors(['Ошибка сохранения!']);
        }
    }

    public function edit(int $id)
    {
        $brand = Brand::query()->findOrFail($id);

        return view('brands.edit', compact('brand'));
    }

    /**
     * @param int $id
     * @param UpdateRequest $request
     * @return RedirectResponse
     */
    public function update(int $id, UpdateRequest $request): RedirectResponse
    {
        $brand = Brand::query()->findOrFail($id);

        try {
            (new BrandRepository)->getUpdate(
                $brand,
                $request->input('title'),
            );

            return redirect()->route('brands.index')->with('message', 'Изменено!');

        } catch (\Throwable $err) {

            Log::error("Brand: update brand error. " . $err->getMessage());
            return redirect()->back()->withErrors(['Ошибка изменения!']);
        }
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        $brand = Brand::query()->findOrFail($id);
        $brand->delete();

        return redirect()->route('brands.index')->with('message', 'Удалено!');
    }
}
