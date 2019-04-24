<?php

namespace App;

trait HasManagers
{

    /**
     * Check if user has a specific manager.
     */
    public function hasManager($name)
    {
        foreach ($this->companies as $company) {
            if ($company->name == $name) return true;
        }

        return false;
    }

    /**
     * Attach company to user.
     */
    public function assignCompany($company)
    {
        return $this->companies()->attach($company);
    }

    /**
     * Detach company from user.
     */
    public function removeCompany($company)
    {
        return $this->companies()->detach($company);
    }
}
