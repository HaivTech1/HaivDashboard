<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

trait MultiTenantModelTrait
{
    public static function bootMultiTenantModelTrait()
    {
        if (!app()->runningInConsole() && auth()->check()) {
            $admins = User::where('type', User::ADMIN)->get();
            
            static::creating(function ($model) {
                $model->author_id = auth()->id();
            });

            static::addGlobalScope('author_id', function (Builder $builder) use ($isSuperAdmin) {
                $builder->when($isSuperAdmin && request()->route()->named('reports.index'), function ($query) {
                        $query->where('author_id', request()->input('employee'));
                    })
                    ->when(!$isSuperAdmin, function ($query) {
                        $query->where('author_id', auth()->id());
                    });
            });
        }
    }
}
