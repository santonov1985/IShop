<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category\Category;
use App\Models\Category\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{

    public function index()
    {

        $categories = Category::query()
            ->orderBy('title')
            ->get();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    /**
     * @throws Throwable
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        try {
            (new CategoryRepository)
                ->getCreate($request->input('title'));

            return redirect()->route('categories.index')->with('message', 'Добавлено!');

        } catch (\Throwable $err) {

            Log::error("Category: create categories error. " . $err->getMessage() . $err->getTraceAsString());
            return redirect()->back()->withErrors(['Ошибка сохранения!']);
        }
    }

    public function edit(int $id)
    {
        $category = Category::query()
            ->findOrFail($id);

        return view('categories.edit', compact('category'));
    }


    public function update(Request $request, int $id): RedirectResponse
    {
        $category = Category::query()
            ->findOrFail($id);

        try{
            (new CategoryRepository())
                ->getUpdate($category, $request->input('title'));

            return redirect()->route('categories.index')->with('message', 'Сохранено!');

        } catch (\Throwable $err) {
            Log::error("Category: update categories error. " . $err->getMessage() . $err->getTraceAsString());
            return redirect()->back()->withErrors(['Ошибка сохранения!']);
        }

    }

    public function delete(int $id): RedirectResponse
    {
        $category = Category::query()->findOrFail($id);

        $category->delete();

        return redirect()->route('categories.index')->with('message', 'Удалено!');



    }
}
