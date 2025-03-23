<?php

namespace App\Policies;

use App\Models\JobAd;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class JobAdPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JobAd $jobAd): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->id = JWTAuth::user()->id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JobAd $jobAd): bool
    {
        return $user->id = $jobAd->recruiter_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JobAd $jobAd): bool
    {
        return $user->id = $jobAd->recruiter_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, JobAd $jobAd): bool
    {
        return $user->id = $jobAd->recruiter_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JobAd $jobAd): bool
    {
        return $user->id = $jobAd->recruiter_id;
    }
}
