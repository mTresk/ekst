<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Area extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['name', 'content'];

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('area')
            ->performOnCollections('areas')
            ->fit(Manipulations::FIT_CONTAIN, 400, 200)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('areaWebp')
            ->performOnCollections('areas')
            ->format('webp')
            ->fit(Manipulations::FIT_CONTAIN, 400, 200)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('area@2')
            ->performOnCollections('areas')
            ->fit(Manipulations::FIT_CONTAIN, 800, 400)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('areaWebp@2')
            ->performOnCollections('areas')
            ->format('webp')
            ->fit(Manipulations::FIT_CONTAIN, 800, 400)
            ->nonQueued()
            ->nonOptimized();
    }
}
