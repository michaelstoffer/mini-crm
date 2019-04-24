<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageCompaniesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_guest_cannot_add_a_company()
    {
        //
    }

    /** @test */
    public function a_company_has_employees()
    {
        //
    }
}
