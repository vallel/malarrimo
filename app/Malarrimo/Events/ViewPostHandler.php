<?php

namespace Malarrimo\Events;

use Illuminate\Session\Store;
use Malarrimo\Entities\News;

class ViewPostHandler
{

    /**
     * @var Store
     */
    private $session;

    /**
     * @param Store $session
     */
    public function __construct(Store $session)
    {
        // Let Laravel inject the session Store instance,
        // and assign it to our $session variable.
        $this->session = $session;
    }

    /**
     * @return mixed
     */
    private function getViewedPosts()
    {
        // Get all the viewed posts from the session. If no
        // entry in the session exists, default to null.
        return $this->session->get('viewed_posts', null);
    }

    /**
     * @param News[] $posts
     * @return array
     */
    private function cleanExpiredViews($posts)
    {
        $time = time();

        // Let the views expire after one hour.
        $throttleTime = 3600;

        // Filter through the post array. The argument passed to the
        // function will be the value from the array, which is the
        // timestamp in our case.
        return array_filter($posts, function ($timestamp) use ($time, $throttleTime)
        {
            // If the view timestamp + the throttle time is
            // still after the current timestamp the view
            // has not expired yet, so we want to keep it.
            return ($timestamp + $throttleTime) > $time;
        });
    }

    /**
     * @param News[] $posts
     */
    private function storePosts($posts)
    {
        $this->session->put('viewed_posts', $posts);
    }

    /**
     * @param News $post
     */
    public function handle(News $post)
    {
        if ( ! $this->isPostViewed($post))
        {
            $post->increment('visits');
            $post->visits += 1;

            $this->storePost($post);
        }
    }

    /**
     * @param News $post
     * @return bool
     */
    private function isPostViewed($post)
    {
        $viewed = $this->session->get('viewed_posts', []);

        // Check if the post id exists as a key in the array.
        return array_key_exists($post->id, $viewed);
    }

    /**
     * @param News $post
     */
    private function storePost($post)
    {
        // First make a key that we can use to store the timestamp
        // in the session. Laravel allows us to use a nested key
        // so that we can set the post id key on the viewed_posts
        // array.
        $key = 'viewed_posts.' . $post->id;

        // Then set that key on the session and set its value
        // to the current timestamp.
        $this->session->put($key, time());
    }

}