<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::first();
        return view('companies.index', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'tagline' => 'required',
            'address' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $company = new Company();

        $company->name = $request->input('name');
        $company->tagline = $request->input('tagline');
        $company->address = $request->input('address');

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $filename = $this->generateRandomString() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/images', $filename);
            $company->logo = $filename;
        }

        $company->save();

        return redirect()->route('home')->with('success', 'Company created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        $companies = $company::first();
        return view('companies.show', compact('companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'tagline' => 'required',
            'address' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $company = Company::find($id);

        $company->name = $request->input('name');
        $company->tagline = $request->input('tagline');
        $company->address = $request->input('address');

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $filename = $this->generateRandomString() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/images', $filename);
            $company->logo = $filename;
        }

        $company->update();

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Generate random string for hashing request image filename.
     */
    protected function generateRandomString($length = 30)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0,  $charactersLength - 1)];
        }

        return $randomString;
    }
}
