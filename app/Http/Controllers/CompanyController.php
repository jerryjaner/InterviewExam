<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CompanyFormRequest;

class CompanyController extends Controller
{

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('company.index',compact('companies')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyFormRequest $request)
    {   

        // Validate the incoming request
        $validator = \Validator::make($request->all(), $request->rules());  


        //if validator fail the error message will be returned
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        //Insert Data 
        $create = new Company();
        $create->name = $request->name;
        $create->email = $request->email;
        $create->logo = $request->logo;
        $create->website = $request->website;

        //Store the logo
        if($request -> hasfile('logo')){

            $file = $request->file('logo');
            $extension = $file -> getClientOriginalExtension();
            $filename = time() . '.' .$extension;
            $file->storeAs('public/logo', $filename);
            $create -> logo = $filename;
        }

        //dd($create);
        $create->save();
        
        //For toaster
        $notification = array(
            'message' => 'Company Created Successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyFormRequest $request, company $company)
    {
        $validator = \Validator::make($request->all(), $request->rules());  


        //if validator fail the error message will be returned
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $fileName = '';

        if($request ->hasfile('logo')){
            $file = $request->file('logo');
            $extension = $file -> getClientOriginalExtension();
            $fileName = time() . '.' .$extension;
            $file->storeAs('public/logo/', $fileName);
            if ($company->logo)
            {
                Storage::delete('public/logo/' . $company->logo);
            }
            $company->logo = $fileName;
        }

        // Update Company
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->update();

        // Redirect back with success message
        $notification = array(
            'message' => 'Company updated successfully',
            'alert-type' => 'info'
        );
    
        return redirect()->route('company.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //Delete the logo 
        if (Storage::delete('public/logo/' . $company->logo)) {

			$company->delete();
		}
        else{

            $company->delete();

        }
      
        // Redirect back with success message
        $notification = array(
            'message' => 'Company deleted successfully',
            'alert-type' => 'warning'
        );
    
        return redirect()->back()->with($notification);
    }
}
