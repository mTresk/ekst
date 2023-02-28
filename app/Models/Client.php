<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Client extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['text'];

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('client')
            ->performOnCollections('clients')
            ->format('png')
            ->fit(Manipulations::FIT_CONTAIN, 250, 250)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('clientWebp')
            ->performOnCollections('clients')
            ->format('webp')
            ->fit(Manipulations::FIT_CONTAIN, 250, 250)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('client@2')
            ->performOnCollections('clients')
            ->format('png')
            ->fit(Manipulations::FIT_CONTAIN, 500, 500)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('clientWebp@2')
            ->performOnCollections('clients')
            ->format('webp')
            ->fit(Manipulations::FIT_CONTAIN, 500, 500)
            ->nonQueued()
            ->nonOptimized();
    }
}
