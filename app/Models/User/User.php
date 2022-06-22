<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property int $age
 * @property string $gender
 * @property string $email
 * @property string $password
 */

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    static function getGender(): array
    {
        return [
            self::GENDER_MALE => 'Мужской',
            self::GENDER_FEMALE => 'Женский',
        ];
    }


    public function getGenderNameAttribute(): string
    {
        return self::getGender()[$this->gender];
    }

    public function setNameAttribute($value): string
    {
        return $this->attributes['name'] = Str::ucfirst($value);
    }

    public function setSurnameAttribute($value): string
    {
        return $this->attributes['surname'] = Str::ucfirst($value);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'age',
        'gender',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
