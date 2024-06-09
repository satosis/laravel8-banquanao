<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use App\User;

class Product extends Model
{
//	use LogsActivity;
    protected $guarded = [''];
	protected static $logAttributes = ['*'];
    public $country = [
        "1" => "Việt Nam",
        "2" => "Anh",
        "3" => "Thuỵ Sỹ",
        "4" => "Mỹ"
    ];

    public function getCountry()
    {
        return Arr::get($this->country, $this->pro_country,"[N\A]");
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'pro_category_id');
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class,'products_keywords','pk_product_id','pk_keyword_id');
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class,'products_attributes','pa_product_id','pa_attribute_id');
    }

    public function orders(){
        return $this->belongsTo(Order::class, 'od_product_id');
    }

    public function favourite()
    {
        return $this->belongsToMany(User::class,'user_favourite','uf_product_id','uf_user_id');
    }

    public function images(){
        return $this->hasMany(ProductImage::class, 'pi_product_id');
    }

    protected static function booted () {
        static::deleting(function(Product $product) {
             $product->orders()->delete();
             $product->images()->delete();
             $product->keywords()->delete();
             $product->attributes()->delete();
             $product->favourite()->delete();
        });
    }
}
