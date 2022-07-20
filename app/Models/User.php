<?php

namespace App\Models;

use App\Enums\PostStatus;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Octopy\Impersonate\Concerns\Impersonate;
use Octopy\Impersonate\ImpersonateAuthorization;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, Impersonate;

    protected $table = 'admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function authorPost()
    {
        return $this->hasMany(Post::class, 'author_id')->where('status', PostStatus::PUBLISH);
    }

    public function impersonatable(ImpersonateAuthorization $authorization)
    {
        $authorization->impersonator(fn(User $user) => $user->hasRole('admin'));
        $authorization->impersonated(fn(User $user) => $user->hasRole('writter') || $user->hasRole('editor'));
    }
}
