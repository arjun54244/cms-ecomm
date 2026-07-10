<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [

        'category_id',
        'name',
        'slug',
        'sku',
        'featured_image',
        'short_description',
        'description',
        'price',
        'sale_price',
        'cost_price',
        'stock',
        'weight',
        'gender',
        'fabric',
        'fit',
        'care_instruction',
        'is_featured',
        'is_new',
        'is_active',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [

        'price' => 'decimal:2',

        'sale_price' => 'decimal:2',

        'cost_price' => 'decimal:2',

        'is_featured' => 'boolean',

        'is_new' => 'boolean',

        'is_active' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class)
            ->orderBy('sort_order');
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
    public function getDiscountPercentageAttribute()
    {
        if (!$this->sale_price) {
            return 0;
        }

        return round(
            (($this->price - $this->sale_price) / $this->price) * 100
        );
    }
}
