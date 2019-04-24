<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id', 'first_name', 'last_name', 'email', 'phone'
    ];

    /**
     *  The path to the employee.
     *
     * @return string
     */
    public function path()
    {
        return "/companies/{$this->company_id}/employees/{$this->id}";
    }

    /**
     * Get the company that owns the employee.
     */
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
