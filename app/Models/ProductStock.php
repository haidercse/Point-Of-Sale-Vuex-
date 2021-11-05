<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    use HasFactory;

    public const STOCK_IN = 'in';
    public const STOCK_OUT = 'out';

    protected $fillable = [
        'product_id',
        'size_id',
        'quantity',
        'date',
        'status',
    ];

    /**
     * Get the product that owns the ProductStock
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
