<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'logo', 'website'
    ];

    /**
     *  The path to the company.
     *
     * @return string
     */
    public function path()
    {
        return "/companies/{$this->id}";
    }

    /**
     * Get the employees for the company.
     */
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }

    /**
     * The managers that belong to the company.
     */
    public function managers()
    {
        return $this->belongsToMany('App\User', 'manager_company')->using('App\ManagerCompany');
    }
}
