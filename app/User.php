<?php

namespace App;

use App\models\Archive;
use App\models\Category;
use App\models\Discount;
use App\models\ImagePerProduct;
use App\models\Product;
use App\models\ProductsPerPurchase;
use App\models\Purchase;
use App\models\SubCategory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements MustVerifyEmail
{
    // use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public static function uploadAvatar($image)
    {
        $filename = $image->getClientOriginalName();

        (new self())->deleteOldImage();

        $image->storeAs('images', $filename, 'public');
        auth()->user()->update(['avatar' => $filename]);

    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getNameAttribute($name)
    {
        return ucwords($name);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected function deleteOldImage()
    {
        if ($this->avatar) :
            Storage::delete('/storage/images/' . $this->avatar);
        endif;
    }

    public function todos()
    {
        return $this->hasMany(Todo::class)->orderBy('completed');
    }
}
