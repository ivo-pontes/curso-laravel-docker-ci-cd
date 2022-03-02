<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Module;

class ModuleObserver
{
    /**
     * Handle the Module "created" event.
     *
     * @param  \App\Models\Module  $module
     * @return void
     */
    public function creating(Module $module)
    {
        $module->uuid = (string) Str::uuid();
    }
}