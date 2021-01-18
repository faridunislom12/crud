<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    /**
     * Get the product category.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }


    /**
     * Get the product orders.
     */
    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');
    }


    /**
     * Get the product crudes.
     */
    public function crudes()
    {
        return $this->belongsToMany('App\Models\Crude')->withPivot('crude_qty', 'crude_price');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'articul',
        'size',
        'width',
        'girth',
        'quantity',
        'image',
        'cost',
        'markup',
        'price',
        'sale',
        'category_id',
        'is_active',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'image' => 'array',
    ];

}
