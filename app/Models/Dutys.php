<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Dutys extends Model implements HasMedia
{
    use softDeletes;
    use HasFactory, InteractsWithMedia;

    protected $table = 'dutys';
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function customer()
    {
        return $this->belongsTo(customer::class, 'customer_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('duty_img');
        $this->addMediaCollection('duty_docs');
    }

    public function registerMediaConversions(Media $media = null): void{
        $this->addMediaConversion('thumb')->width(50)->height(50)->performOnCollections('duty_img');
    }
}
