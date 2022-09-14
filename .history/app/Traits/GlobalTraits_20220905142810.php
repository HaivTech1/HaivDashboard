<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait GlobalTraits
{
    public static function bootGlobal()
    {

        if (auth()->check()) 
        {
            
            static::creating(function ($model) {
                $model->created_by_id = auth()->id();
            });
 
            static::addGlobalScope('created_by_id', function(Builder $builder) {

                if (auth()->check()) {
                    
                    return $builder->where('created_by_id', auth()->id());
                }
            });
        }
    }
}


