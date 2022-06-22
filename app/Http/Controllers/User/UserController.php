<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Store;
use App\Models\User\User;
use App\Models\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->orderBy('name')
            ->get();

        return view('users.index',compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    /**
     * @throws Throwable
     */
    public function store(Store $request): RedirectResponse
    {
        try {
            (new UserRepository)->getCreate(
                $request->input('name'),
                $request->input('surname'),
                $request->input('age'),
                $request->input('gender'),
                $request->input('email'),
                $request->input('password'),
            );

            return redirect()->route('users.index')->with('message', 'Добавлено!');

        } catch (\Throwable $err) {
            Log::error("Users: create User error. " . $err->getMessage() . $err->getTraceAsString());
            return redirect()->back()->withErrors(['Ошибка сохранения!']);
        }

    }

    public function edit($id)
    {
        $user = User::query()->findOrFail($id);

        return view('users.edit', compact('user'));
    }

    /**
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $user = User::query()
            ->findOrFail($id);

        try {
            (new UserRepository)->getUpdate(
                $user,
                $request->input('name'),
                $request->input('surname'),
                $request->input('age'),
                $request->input('gender'),
                $request->input('email'),
                $request->input('password'),
            );

            return redirect()->route('users.index')->with('message', 'Сохранено!');

        } catch (\Throwable $err) {
            Log::error("Users: update User error. " . $err->getMessage() . $err->getTraceAsString());
            return redirect()->back()->withErrors(['Ошибка сохранения!']);
        }
    }
    public function delete()
    {

    }
}
