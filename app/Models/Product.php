<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'brand_id',
        'name',
        'sku',
        'image',
        'cost_price',
        'retail_price',
        'year',
        'description',
        'status',
    ];

    protected $appends = ['product_image','text'];
 

    public const STATUS_ACTIVE = 1;
    public const STATUS_InACTIVE = 0;


   /**
    * get product path 
    * for vuex at first product path store in variable
    * 
    */
    public function getProductImageAttribute(){
        return asset('images/products/'.$this->image);
    }
    public function getTextAttribute(){
        return $this->name;
    }
    /**
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id','id');
    }
    public function product_stocks()
    {
        return $this->hasMany(ProductSizeStock::class,'product_id','id');
    }
   
}
