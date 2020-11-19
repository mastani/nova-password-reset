<?php

namespace Mastani\NovaPasswordReset;

use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class NovaPasswordReset extends Tool
{
    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::script('nova-password-reset', __DIR__.'/../dist/js/tool.js');
    }
}
