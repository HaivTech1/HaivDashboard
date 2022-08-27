<?php

namespace App\Models;

use App\Traits\HasAuthor;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    use HasAuthor;

    const TABLE = 'events';

    protected $table = self::TABLE;

    protected $fillable = [
        'title', 
        'description', 
        'start', 
        'end', 
        'category',
        'status'
     ];

     
    protected $casts = [
        'status'  => 'boolean',
        'start' => 'datetime',
        'end' => 'datetime',
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

     public function description(): string
     {
         return $this->description;
     }

     public function excerpt (int $limit = 100): string
     {
         return Str::limit(strip_tags($this->description()) , $limit);
     }

     public function category(): string
     {
         return $this->category;
     }

     public function startDate(): ?string
     {
         return $this->start->format('d F Y');
     }
 
     public function endDate(): ?string
     {
         return $this->end->format('d F Y');
     }

     public function scopeAvailable(Builder $query): Builder
     {
         return $query->where('status', true);
     }
}
