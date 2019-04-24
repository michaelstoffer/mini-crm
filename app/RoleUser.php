<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RoleUser extends Pivot
{

    /**
     * Specify the table of the model
     *
     * @var string
     */
    protected $table = 'role_users';
}
