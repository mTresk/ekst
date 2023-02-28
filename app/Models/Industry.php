<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Industry extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['name', 'slug', 'content'];

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('industry')
            ->performOnCollections('industries')
            ->fit(Manipulations::FIT_CONTAIN, 400, 260)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('industryWebp')
            ->performOnCollections('industries')
            ->format('webp')
            ->fit(Manipulations::FIT_CONTAIN, 400, 260)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('industry@2')
            ->performOnCollections('industries')
            ->fit(Manipulations::FIT_CONTAIN, 800, 320)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('industryWebp@2')
            ->performOnCollections('industries')
            ->format('webp')
            ->fit(Manipulations::FIT_CONTAIN, 800, 320)
            ->nonQueued()
            ->nonOptimized();

        $this
            ->addMediaConversion('industryHeader')
            ->performOnCollections('industries')
            ->fit(Manipulations::FIT_CONTAIN, 1440, 350)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('industryHeaderWebp')
            ->performOnCollections('industries')
            ->format('webp')
            ->fit(Manipulations::FIT_CONTAIN, 1440, 350)
            ->nonQueued()
            ->nonOptimized();
    }
}
