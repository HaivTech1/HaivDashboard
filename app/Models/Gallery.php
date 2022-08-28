<?php

namespace App\Models;

use App\Traits\HasAuthor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;
    use HasAuthor;
    
    const TABLE = 'galleries';

    protected $table = self::TABLE;

    protected $fillable = [
        'title', 
        'image', 
        'status',
        'author_id'
     ];

     
    protected $casts = [
        'status'  => 'boolean',
    ];

     public function getAvailableBadgeAttribute()
     {
 
         $available = [
             '0' => 'Not Active',
             '1' => 'Active',
         ];
 
         return $available[$this->status];
     }


     public function id(): string
     {
         return (string) $this->id;
     }
 
     public function title(): string
     {
         return $this->title;
     }

     public function type(): string
     {
         return $this->type;
     }

     public function image(): string
     {
         return $this->image;
     }

     public function createdAt()
     {
         return $this->created_at->format('d-m-Y');
     }

     public function scopeAvailable(Builder $query): Builder
     {
         return $query->where('status', true);
     }

     public function scopeJobImage(Builder $query): Builder
     {
         return $query->where('type', 'job');
     }

     public function scopeGalleryImage(Builder $query): Builder
     {
         return $query->where('type', 'gallery');
     }
}
