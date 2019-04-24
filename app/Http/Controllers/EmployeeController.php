<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function index(Company $company)
    {
        $employees = $company->employees()->paginate(10);

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function create(Company $company)
    {
        $this->authorize('create', [Employee::class, $company]);

        return view('employees.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = Employee::create($this->validateRequest());

        return redirect($employee->path());
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Company  $company
     * @param \App\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company, Employee $employee)
    {
        return view('employees.show', compact('company', 'employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Company  $company
     * @param \App\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company, Employee $employee)
    {
        return view('employees.edit', compact('company', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Company             $company
     * @param \App\Employee            $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company, Employee $employee)
    {
        $this->authorize('update', [$company, $employee]);

        $employee->update($this->validateRequest());

        return redirect($employee->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }

    /**
     * Validate the request attributes.
     *
     * @return array
     */
    protected function validateRequest()
    {
        return request()->validate(
            [
                'company_id' => 'required',
                'first_name' => 'required',
                'last_name'  => 'required',
                'email'      => 'nullable',
                'phone'      => 'nullable'
            ]);
    }
}
