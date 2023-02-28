<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Program extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['name', 'description', 'content', 'file', 'slug'];

    protected $casts = [
        'file' => 'array',
    ];

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('program')
            ->performOnCollections('programs')
            ->format('png')
            ->fit(Manipulations::FIT_CONTAIN, 390, 220)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('programWebp')
            ->performOnCollections('programs')
            ->format('webp')
            ->fit(Manipulations::FIT_CONTAIN, 390, 220)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('program@2')
            ->performOnCollections('programs')
            ->fit(Manipulations::FIT_CONTAIN, 780, 440)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('programWebp@2')
            ->performOnCollections('programs')
            ->format('webp')
            ->fit(Manipulations::FIT_CONTAIN, 780, 440)
            ->nonQueued()
            ->nonOptimized();
    }
}
