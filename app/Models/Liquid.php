<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Liquid extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['name', 'description'];

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('liquid')
            ->performOnCollections('liquids')
            ->format('png')
            ->fit(Manipulations::FIT_CONTAIN, 390, 220)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('liquidWebp')
            ->performOnCollections('liquids')
            ->format('webp')
            ->fit(Manipulations::FIT_CONTAIN, 390, 220)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('liquid@2')
            ->performOnCollections('liquids')
            ->fit(Manipulations::FIT_CONTAIN, 780, 440)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('liquidWebp@2')
            ->performOnCollections('liquids')
            ->format('webp')
            ->fit(Manipulations::FIT_CONTAIN, 780, 440)
            ->nonQueued()
            ->nonOptimized();
    }
}
