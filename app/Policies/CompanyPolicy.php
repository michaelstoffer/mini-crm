<?php

namespace App\Policies;

use App\User;
use App\Company;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
{

    use HandlesAuthorization;

    /**
     * Determine whether the user can create companies.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->hasRole('Manager')) return false;

        return true;
    }

    /**
     * Determine whether the user can update the company.
     *
     * @param \App\User    $user
     * @param \App\Company $company
     * @return mixed
     */
    public function update(User $user, Company $company)
    {
        if ($user->hasRole('Manager') && ! $user->hasManager($company->name)) return false;

        return true;
    }

    /**
     * Determine whether the user can delete the company.
     *
     * @param \App\User    $user
     * @param \App\Company $company
     * @return mixed
     */
    public function delete(User $user, Company $company)
    {
        if ($user->hasRole('Manager')) return false;

        return true;
    }
}
