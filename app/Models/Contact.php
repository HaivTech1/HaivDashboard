<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    const TABLE = 'contacts';

    protected $table = self::TABLE;

    protected $fillable = [
        'name', 
        'email', 
        'phone', 
        'message', 
        'status',
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
 
     public function name(): string
     {
         return $this->name;
     }

     public function email(): string
     {
         return $this->email;
     }

     public function phone(): string
     {
         return $this->phone;
     }

     public function message(): string
     {
         return $this->message;
     }
}
