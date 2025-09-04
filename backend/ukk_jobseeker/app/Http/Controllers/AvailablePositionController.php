<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AvailablePosition;
use Exception;

class AvailablePositionController extends Controller
{
    public function create(Request $request)
    {
        try {
            $position = AvailablePosition::create([
                'company_id'   => $request->company_id,
                'title'        => $request->title,
                'description'  => $request->description,
                'salary'       => $request->salary,
                'deadline'     => $request->deadline,
                'status'       => $request->status ?? 'active',
            ]);

            return response()->json([
                'status'  => true,
                'message' => 'Available Position created successfully',
                'data'    => $position
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
