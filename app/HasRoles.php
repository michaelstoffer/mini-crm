<?php

namespace App;

trait HasRoles
{

    /**
     * Check if user has a specific role.
     */
    public function hasRole($name)
    {
        foreach ($this->roles as $role) {
            if ($role->name == $name) return true;
        }

        return false;
    }

    /**
     * Attach role to user.
     */
    public function assignRole($role)
    {
        return $this->roles()->attach($role);
    }

    /**
     * Detach role from user.
     */
    public function removeRole($role)
    {
        return $this->roles()->detach($role);
    }
}
