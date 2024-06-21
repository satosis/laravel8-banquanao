<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Comments;
use App\Models\Rating;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'name', 'email', 'password', 'address', 'avatar', 'balance', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function favourite()
    {
        return $this->belongsToMany(Product::class, 'user_favourite', 'uf_user_id', 'uf_product_id');
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'tst_user_id');
    }

    public function comment()
    {
        return $this->hasMany(Comments::class, 'cmt_user_id');
    }

    public function rating()
    {
        return $this->hasMany(Rating::class, 'r_user_id');
    }

    protected static function booted () {
        static::deleting(function(User $user) {
            $user->transaction()->delete();
            $user->favourite()->delete();
            $user->comment()->delete();
            $user->rating()->delete();
        });
    }
}
