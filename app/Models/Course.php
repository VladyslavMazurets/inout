<?php

/** Auto-generated by Craftable PRO */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Brackets\CraftablePro\Media\ProcessMediaTrait;
use Brackets\CraftablePro\Media\AutoProcessMediaTrait;
use Brackets\CraftablePro\Media\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Brackets\CraftablePro\Media\HasMediaPreviewsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Course extends Model  implements HasMedia
{

    use SoftDeletes;
    use HasSlug;
    use HasFactory;
    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use InteractsWithMedia;
    use HasMediaPreviewsTrait;

    protected $table = 'courses';
    protected $fillable = ['title', 'slug', 'description', 'price', 'discount', 'duration', 'content'];

    public function instructors()
    {
        return $this->belongsToMany(Instructor::class);
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('baner');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->autoRegisterPreviews();
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['title'])
            ->saveSlugsTo('slug');
    }


    protected $casts = [];
}
