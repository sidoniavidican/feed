<?php

namespace App\Policies;

use App\Feed;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FeedPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any feeds.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the feed.
     *
     * @param  \App\User  $user
     * @param  \App\Feed  $feed
     * @return mixed
     */
    public function view(User $user, Feed $feed)
    {
        //
    }

    /**
     * Determine whether the user can create feeds.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the feed.
     *
     * @param  \App\User  $user
     * @param  \App\Feed  $feed
     * @return mixed
     */
    public function update(User $user, Feed $feed)
    {
        return $user->id==$feed->user_id;
    }

    /**
     * Determine whether the user can delete the feed.
     *
     * @param  \App\User  $user
     * @param  \App\Feed  $feed
     * @return mixed
     */
    public function delete(User $user, Feed $feed)
    {
        //
    }

    /**
     * Determine whether the user can restore the feed.
     *
     * @param  \App\User  $user
     * @param  \App\Feed  $feed
     * @return mixed
     */
    public function restore(User $user, Feed $feed)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the feed.
     *
     * @param  \App\User  $user
     * @param  \App\Feed  $feed
     * @return mixed
     */
    public function forceDelete(User $user, Feed $feed)
    {
        //
    }
}
