<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\StoreRequest;
use App\Http\Requests\Tag\UpdateRequest;
use App\Models\Tag\Tag;
use App\Models\Tag\TagRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;
use Illuminate\Http\RedirectResponse;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::query()
            ->orderBy('title')
            ->get();

        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        return view('tags.create');
    }

    /**
     * @throws Throwable
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        try {
            (new TagRepository)
                ->getCreate($request->input('title'));

            return redirect()->route('tags.index')->with('message', 'Сохранено!');

        } catch (\Throwable $err) {
            Log::error("Tag: create tag error. " . $err->getMessage() . $err->getTraceAsString());
            return redirect()->back()->withErrors(['Ошибка сохранения!']);
        }
    }

    public function edit(int $id)
    {
        $tag = Tag::query()
            ->findOrFail($id);

        return view('tags.edit', compact('tag'));
    }

    public function update(int $id, UpdateRequest $request): RedirectResponse
    {
        $tag = Tag::query()
            ->findOrFail($id);

        try {
            (new TagRepository)
                ->getUpdate($tag, $request->input('title'));

            return redirect()->route('tags.index')->with('message', 'Изменено!');

        } catch (\Throwable $err) {
            Log::error("Tag: update tag error. " . $err->getMessage() . $err->getTraceAsString());
            return redirect()->back()->withErrors(['Ошибка изменения!']);
        }
    }

    public function delete($id)
    {
        $tag = Tag::query()
            ->findOrFail($id);

        $tag->delete();

        return redirect()->route('tags.index')->with('message', 'Удалено!');
    }

}
