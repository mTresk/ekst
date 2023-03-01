<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['name', 'slug', 'short_description', 'description', 'video', 'content', 'facilities', 'product_category_id', 'file'];

    protected $casts = [
        'facilities' => 'array',
        'file' => 'array',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('product')
            ->performOnCollections('products')
            ->format('png')
            ->fit(Manipulations::FIT_CONTAIN, 540, 540)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('productWebp')
            ->performOnCollections('products')
            ->format('webp')
            ->fit(Manipulations::FIT_CONTAIN, 540, 540)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('product@2')
            ->performOnCollections('products')
            ->format('png')
            ->fit(Manipulations::FIT_CONTAIN, 1080, 1080)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('productWebp@2')
            ->performOnCollections('products')
            ->format('webp')
            ->fit(Manipulations::FIT_CONTAIN, 1080, 1080)
            ->nonQueued()
            ->nonOptimized();

        $this
            ->addMediaConversion('slider@2')
            ->performOnCollections('sliders')
            ->format('png')
            ->fit(Manipulations::FIT_CROP, 1800, 1200)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('sliderWebp@2')
            ->performOnCollections('sliders')
            ->format('webp')
            ->fit(Manipulations::FIT_CROP, 1800, 1200)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('sliderThumb@2')
            ->performOnCollections('sliders')
            ->format('png')
            ->fit(Manipulations::FIT_CROP, 360, 360)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('sliderThumbWebp@2')
            ->performOnCollections('sliders')
            ->format('webp')
            ->fit(Manipulations::FIT_CROP, 360, 360)
            ->nonQueued()
            ->nonOptimized();

        $this
            ->addMediaConversion('slider')
            ->performOnCollections('sliders')
            ->format('png')
            ->fit(Manipulations::FIT_CROP, 900, 600)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('sliderWebp')
            ->performOnCollections('sliders')
            ->format('webp')
            ->fit(Manipulations::FIT_CROP, 900, 600)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('sliderThumb')
            ->performOnCollections('sliders')
            ->format('png')
            ->fit(Manipulations::FIT_CROP, 180, 180)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('sliderThumbWebp')
            ->performOnCollections('sliders')
            ->format('webp')
            ->fit(Manipulations::FIT_CROP, 180, 180)
            ->nonQueued()
            ->nonOptimized();
    }
}
