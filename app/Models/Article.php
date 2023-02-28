<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Article extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['title', 'slug', 'content', 'published_at', 'category_id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('article')
            ->performOnCollections('articles')
            ->fit(Manipulations::FIT_CONTAIN, 900, 900)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('articleWebp')
            ->performOnCollections('articles')
            ->format('webp')
            ->fit(Manipulations::FIT_CONTAIN, 900, 900)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('article@2')
            ->performOnCollections('articles')
            ->fit(Manipulations::FIT_CONTAIN, 1800, 1800)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('articleWebp@2')
            ->performOnCollections('articles')
            ->format('webp')
            ->fit(Manipulations::FIT_CONTAIN, 1800, 1800)
            ->nonQueued()
            ->nonOptimized();


        $this
            ->addMediaConversion('articleThumb')
            ->performOnCollections('articles')
            ->fit(Manipulations::FIT_CONTAIN, 400, 230)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('articleThumbWebp')
            ->performOnCollections('articles')
            ->format('webp')
            ->fit(Manipulations::FIT_CONTAIN, 400, 230)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('articleThumb@2')
            ->performOnCollections('articles')
            ->fit(Manipulations::FIT_CONTAIN, 800, 460)
            ->nonQueued()
            ->nonOptimized();
        $this
            ->addMediaConversion('articleThumbWebp@2')
            ->performOnCollections('articles')
            ->format('webp')
            ->fit(Manipulations::FIT_CONTAIN, 800, 460)
            ->nonQueued()
            ->nonOptimized();
    }
}
