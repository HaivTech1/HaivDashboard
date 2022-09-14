<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait GlobalTraits
{
    public static function bootGlobal()
    {

        if (!app()->runningInConsole() && auth()->check()) {            
            static::creating(function ($model) {
                $model->author_id = auth()->id();
            });
 
            static::addGlobalScope('author_id', function(Builder $builder) {

                if (auth()->check()) {
                    
                    return $builder->where('author_id', auth()->id());
                }
            });
        }
    }
}


