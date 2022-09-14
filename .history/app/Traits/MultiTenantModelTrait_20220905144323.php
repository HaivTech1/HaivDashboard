<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait MultiTenantModelTrait
{
    public static function bootMultiTenantModelTrait()
    {
        if (!app()->runningInConsole() && auth()->check()) {

            $isAdmin = auth()->user()->isAdmin();

            static::addGlobalScope('author_id', function (Builder $builder) use ($isAdmin) {
                $builder->when(!$isAdmin, function ($query) {
                        $query->where('author_id', auth()->id());
                    });
            });

            static::creating(function ($model) {
                $model->author_id = auth()->id();
            });
        }
    }
}
