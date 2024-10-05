<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanyCreateRequest;
use App\Http\Requests\Company\CompanyUpdateRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log; 
use Intervention\Image\Laravel\Facades\Image;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Company::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('website', 'like', '%' . $request->search . '%');
        }

        $companies = $query->orderBy('id', 'asc')->paginate(10);

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyCreateRequest $request)
    {
        $logo = $request->file('logo');

        $image = Image::read($logo)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $path = 'logos/' . time() . '_' . $logo->getClientOriginalName();

        $image->save(storage_path('app/public/' . $path));

        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $path,
            'website' => $request->website,
        ]);

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyUpdateRequest $request, $id)
{
    $company = Company::findOrFail($id);

    if ($request->hasFile('logo')) {
        if ($company->logo) {
            Storage::disk('public')->delete($company->logo);
        }

        $logo = $request->file('logo');
        $image = Image::read($logo)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $path = 'logos/' . time() . '_' . $logo->getClientOriginalName();
        $image->save(storage_path('app/public/' . $path));

        $company->logo = $path;
    }

    $company->name = $request->name;
    $company->email = $request->email;
    $company->website = $request->website;

    $company->save();

    // Debugging: Check if the logo is saved correctly
    Log::info("Updated company logo path: " . $company->logo); // Add this line for debugging

    //return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
