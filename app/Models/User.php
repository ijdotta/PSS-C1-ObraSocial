<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Enums\UserRole;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
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

    protected function password(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => bcrypt($value),
        );
    }

    public static function create_returnId($name, $role, $email, $password)
    {

        $user = new User();

        $user->name = $name;
        $user->role = $role;
        $user->email = $email;
        $user->password = $password;

        $user->save();

        return $user->id;
    }

    public function profile()
    {
        $user = auth()->user();

        if (strcmp($user->role, UserRole::AFFILIATE->name) == 0) {
            return $this->hasOne(AdultAffiliate::class, 'user_id');
        } else {
            return $this->hasOne(Employee::class, 'user_id');
        }
    }
}
