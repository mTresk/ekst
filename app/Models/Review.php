<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['name', 'text', 'created_at', 'is_published'];

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }
}
