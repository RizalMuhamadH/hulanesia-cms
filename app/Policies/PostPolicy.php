<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Post $post)
    {
        if($user->hasRole('admin')){
            return true;
        }

        if($user->id === $post->admin_id){
            return true;
        }

        if($post->admin_id == null && $post->status == 'DRAFT' && $user->hasRole('editor')){
            return true;
        }

        if($post->author_id == $user->id && $post->status == 'DRAFT' && $post->admin_id == null){
            return true;
        }


        // return Response::deny('You are not allowed to edit this post.');
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Post $post)
    {
        
        if($user->hasRole('admin')){
            return true;
        }

        if($user->id == $post->admin_id){
            return true;
        }

        if($post->admin_id == null && $post->status == 'DRAFT' && $user->hasRole('editor')){
            return true;
        }

        if($post->author_id == $user->id && $post->status == 'DRAFT' && $post->admin_id == null){
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Post $post)
    {
        if($user->hasRole('admin')){
            return true;
        }

        if($user->id == $post->admin_id){
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Post $post)
    {
        return $user->hasRole('admin');
    }
}
