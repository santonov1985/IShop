<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Color\StoreRequest;
use App\Http\Requests\Color\UpdateRequest;
use App\Models\Color\Color;
use App\Models\Color\ColorRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;

class ColorController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $colors = Color::query()
            ->orderBy('name')
            ->get();

        return view('colors.index', compact('colors'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('colors.create');
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        try {
            (new ColorRepository)->getCreate(
                $request->input('name'),
                $request->input('color')
            );

            return redirect()
                ->route('colors.index')
                ->with('message', 'Добавлено!');

        } catch (\Throwable $err) {
            Log::error("Colors: create Color error. " . $err->getMessage() . $err->getTraceAsString());
            return redirect()->back()->withErrors(['Ошибка создания!']);
        }
    }

    public function edit($id)
    {
        $color = Color::query()
            ->findOrFail($id);

        return view('colors.edit', compact('color'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $color = Color::query()
            ->findOrFail($id);

        try {
            (new ColorRepository)->getUpdate(
                $color,
                $request->input('name'),
                $request->input('color'),
            );

            return redirect()
                ->route('colors.index')
                ->with('message', 'Изменено!');

        } catch (\Throwable $err) {
            Log::error("Colors: update color error. " . $err->getMessage() . $err->getTraceAsString());
            return redirect()->back()->withErrors(['Ошибка изменения!']);
        }
    }

    public function delete($id): RedirectResponse
    {
        $color = Color::query()->findOrFail($id);

        $color->delete();

        return redirect()
            ->route('colors.index')
            ->with('message', 'Удалено!');
    }

}
