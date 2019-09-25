<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait AuthCheck
{
    public function dismissGuest()
    {
        if(Auth::guest())
        {
            return $this->sendError('Not Authorized', 404);
        }

        return null;
    }

}