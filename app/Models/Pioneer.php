<?php

namespace App\Models;

use App\Traits\HasAuthor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pioneer extends Model
{
    use HasFactory;
    use HasAuthor;
    
    const TABLE = 'pioneers';

    protected $table = self::TABLE;

    protected $fillable = [
        'facebook', 
        'instagram', 
        'linkedin', 
        'twitter',
        'designation',
        'author_id',
        'status'
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

     public function facebook(): string
     {
         return $this->facebook;
     }

     public function linkedin(): string
     {
         return $this->linkedin;
     }

     public function twitter(): string
     {
         return $this->twitter;
     }

     public function instagram(): string
     {
         return $this->instagram;
     }

     public function designation(): string
     {
         return $this->designation;
     }
     
     public function scopeSearch($query, $term)
     {
         $term = "%$term%";
         return $query->where(function($query) use ($term) {
             $query->where('designation', 'like', $term)
                     ->orWhere('facebook', 'like', $term)
                        ->orWhere('linkedin', 'like', $term);
         });
     }

     public function scopeLoadLatest(Builder $query, $count = 4)
     {
         return $query->inRandomOrder()->paginate($count);
     }
}
