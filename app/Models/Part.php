<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Part extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['name', 'description'];

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('part')
            ->performOnCollections('parts')
            ->format('png')
            ->fit(Manipulations::FIT_CONTAIN, 390, 220)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('partWebp')
            ->performOnCollections('parts')
            ->format('webp')
            ->fit(Manipulations::FIT_CONTAIN, 390, 220)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('part@2')
            ->performOnCollections('parts')
            ->fit(Manipulations::FIT_CONTAIN, 780, 440)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('partWebp@2')
            ->performOnCollections('parts')
            ->format('webp')
            ->fit(Manipulations::FIT_CONTAIN, 780, 440)
            ->nonQueued()
            ->nonOptimized();
    }
}
