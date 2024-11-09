<?php

/** Auto-generated by Craftable PRO */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\CraftablePro\Media\ProcessMediaTrait;
use Brackets\CraftablePro\Media\AutoProcessMediaTrait;
use Brackets\CraftablePro\Media\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Brackets\CraftablePro\Media\HasMediaPreviewsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends Model  implements HasMedia
{
    use HasFactory;
    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use InteractsWithMedia;
    use HasMediaPreviewsTrait;

    protected $table = 'testimonials';
    protected $fillable = ['name', 'position', 'rating', 'content', 'custom_link', 'date'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('customer_avatar');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->autoRegisterPreviews();
    }


    protected $casts = [];
}