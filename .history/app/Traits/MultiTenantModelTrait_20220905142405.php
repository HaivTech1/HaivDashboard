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

            static::addGlobalScope('author_id', function (Builder $builder) use ($admins) {
                $builder->when($admins && request()->route()->named('reports.index'), function ($query) {
                        $query->where('author_id', request()->input('employee'));
                    })
                    ->when(!$admins, function ($query) {
                        $query->where('author_id', auth()->id());
                    });
            });

            static::creating(function ($model) {
                $model->author_id = auth()->id();
            });
        }
    }
}
