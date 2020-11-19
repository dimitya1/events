<?php

namespace App\Services\Comment;

use \Illuminate\Support\Facades\Facade;

class CommentFacade extends Facade {

    /**
     * Get the registered name of the component. This tells $this->app what record to return
     * (e.g. $this->app[‘eventService’])
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'commentService'; }

}
