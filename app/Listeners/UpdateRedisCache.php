<?php

namespace Ingresse\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateRedisCache
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(\Ingresse\Repositories\UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Log::info('all users', $this->repository->all());
        \Redis::set('users',
            $this->repository->all()
        );
    }
}
