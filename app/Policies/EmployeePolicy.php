<?php

namespace App\Policies;

use App\User;
use App\Company;
use App\Employee;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
{

    use HandlesAuthorization;

    /**
     * Determine whether the user can create employees.
     *
     * @param \App\User    $user
     * @param \App\Company $company
     * @return mixed
     */
    public function create(User $user, Company $company)
    {
        if ($user->hasRole('Manager') && ! $user->hasManager($company->name)) return false;

        return true;
    }

    /**
     * Determine whether the user can update the employee.
     *
     * @param \App\User     $user
     * @param \App\Company  $company
     * @param \App\Employee $employee
     * @return mixed
     */
    public function update(User $user, Company $company, Employee $employee)
    {
        if ($user->hasRole('Manager') && ! $user->hasManager($company->name)) return false;

        return true;
    }

    /**
     * Determine whether the user can delete the employee.
     *
     * @param \App\User     $user
     * @param \App\Employee $employee
     * @return mixed
     */
    public function delete(User $user, Employee $employee)
    {
        if ($user->hasRole('Manager') && ! $user->hasManager($employee->company->name)) return false;

        return true;
    }
}
