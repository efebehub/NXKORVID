<?php

namespace App\Policies;

use App\Models\Api\v1\Auth\User;
use App\Models\Api\v1\Stock\StkListaPrecios;
use Illuminate\Auth\Access\HandlesAuthorization;

class StkListaPreciosPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Api\v1\Auth\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Api\v1\Auth\User  $user
     * @param  \App\Models\Api\v1\Stock\StkListaPrecios  $stkListaPrecios
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, StkListaPrecios $stkListaPrecios)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Api\v1\Auth\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Api\v1\Auth\User  $user
     * @param  \App\Models\Api\v1\Stock\StkListaPrecios  $stkListaPrecios
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, StkListaPrecios $stkListaPrecios)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Api\v1\Auth\User  $user
     * @param  \App\Models\Api\v1\Stock\StkListaPrecios  $stkListaPrecios
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, StkListaPrecios $stkListaPrecios)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Api\v1\Auth\User  $user
     * @param  \App\Models\Api\v1\Stock\StkListaPrecios  $stkListaPrecios
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, StkListaPrecios $stkListaPrecios)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Api\v1\Auth\User  $user
     * @param  \App\Models\Api\v1\Stock\StkListaPrecios  $stkListaPrecios
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, StkListaPrecios $stkListaPrecios)
    {
        //
    }
}
