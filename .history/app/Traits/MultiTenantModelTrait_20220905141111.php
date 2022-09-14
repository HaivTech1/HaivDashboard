<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait MultiTenantModelTrait
{
    public static function bootMultiTenantModelTrait()
    {
        if (!app()->runningInConsole() && auth()->check()) {
            $isSuperAdmin = auth()->user()->roles->contains(1);
            static::creating(function ($model) {
                $model->user_id = auth()->id();
            });

            static::addGlobalScope('user_id', function (Builder $builder) use ($isSuperAdmin) {
                $builder->when($isSuperAdmin && request()->route()->named('reports.index'), function ($query) {
                        $query->where('user_id', request()->input('employee'));
                    })
                    ->when(!$isSuperAdmin, function ($query) {
                        $query->where('user_id', auth()->id());
                    });
            });
        }
    }
}
