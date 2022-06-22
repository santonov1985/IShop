<?php

namespace App\Models\User;

use Throwable;

class UserRepository
{
    /**
     * @throws Throwable
     */
    public function getCreate(
        string $name,
        string $surname,
        int $age,
        string $gender,
        string $email,
        string $password
    )
    {
        $user = new User();

        $user->name = $name;
        $user->surname = $surname;
        $user->age = $age;
        $user->gender = $gender;
        $user->email = $email;
        $user->password = bcrypt($password);

        $user->saveOrFail();
    }

    public function getUpdate(
        User $user,
        string $name,
        string $surname,
        int $age,
        string $gender,
        string $email,
        string $password = null
    )
    {
        $user->name = $name;
        $user->surname = $surname;
        $user->age = $age;
        $user->gender = $gender;
        $user->email = $email;

        if ($password !== null) {
            $user->password = bcrypt($password);
        }

        $user->saveOrFail();
    }
}
