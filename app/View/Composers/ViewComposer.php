<?php

namespace App\View\Composers;

use App\Models\User;
use Illuminate\View\View;

class ViewComposer{

    protected $users;

    public function compose(View $view)
    {
        $view->with('globalUsers', User::get());
    }
}