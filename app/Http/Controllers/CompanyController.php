<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('Manager')) {
            $user_id = auth()->user()->id;
            $companies = Company::with('managers')->whereHas('managers', function ($q) use ($user_id) {
                $q->where('user_id', '=', $user_id);
            })->paginate(10);
        } else {
            $companies = Company::paginate(10);
        }

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', [Company::class]);

        return view('companies.create');
    }

    /**
     * Show the form for creating a new logo.
     *
     * @param \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function createLogo(Company $company)
    {
        $this->authorize('create', [Company::class]);

        return view('companies.logo', compact('company'));
    }

    /**
     * Store a newly created logo in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function storeLogo(Request $request, Company $company)
    {
        request()->validate([
            'logo' => ['nullable', 'image', Rule::dimensions()->minWidth(100)->minHeight(100)]
        ]);

        $path = Storage::disk('public')->putFile('/', $request->logo);
        $company->logo = $path;
        $company->save();

        return redirect($company->path());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = auth()->user()->companies()->create($this->validateRequest());

        return redirect($company->path());
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $employees = $company->employees()->paginate(10);

        return view('companies.show', compact('company', 'employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $this->authorize('update', $company);

        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Company             $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $this->authorize('update', $company);

        $company->update($this->validateRequest());

        return redirect($company->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
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
        return request()->validate([
            'name' => 'required',
            'email' => 'nullable',
            'website' => 'nullable'
        ]);
    }
}
