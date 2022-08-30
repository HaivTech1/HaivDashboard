<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotificationPolicy
{
    
    const MARKASREAD = 'markasread';
    
    public function __construct()
    {
        //
    }
}
