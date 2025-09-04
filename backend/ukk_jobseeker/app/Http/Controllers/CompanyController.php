<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Exception;

class CompanyController extends Controller
{
    // CREATE COMPANY
    public function create(Request $request)
    {
        try {
            $company = Company::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Company created successfully',
                'data' => $company
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    // READ ALL COMPANIES
    public function read()
    {
        $companies = Company::all();
        return response()->json($companies);
    }

    // READ COMPANY BY ID
    public function readById($id)
    {
        $company = Company::find($id);
        if (!$company) {
            return response()->json(['status' => false, 'message' => 'Company not found']);
        }
        return response()->json($company);
    }

    // READ ME (contohnya ambil berdasarkan user login)
    public function readMe(Request $request)
    {
        $company = Company::where('user_id', $request->user()->id)->first();
        return response()->json($company);
    }

    // UPDATE COMPANY
    public function update(Request $request, $id)
    {
        $company = Company::find($id);
        if (!$company) {
            return response()->json(['status' => false, 'message' => 'Company not found']);
        }

        $company->update($request->all());
        return response()->json(['status' => true, 'message' => 'Company updated', 'data' => $company]);
    }
}
