<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();

        return response([
            'message' => 'success',
            'data' => $departments
        ], 201);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $user = Auth::user();

        $department = new Department();
        $department->company_id = 1;
        $department->created_by = $user->id;
        $department->name = $request->name;
        $department->description = $request->description;
        $department->save();

        return response([
            'message' => 'success',
            'data' => $department
        ], 201);
    }

    public function show($id)
    {
        $department = Department::find($id);
        if (!$department) {
            return response([
                'message' => 'Department not found',
            ], 404);
        }

        return response([
            'message' => 'success',
            'data' => $department
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $department = Department::find($id);
        if (!$department) {
            return response([
                'message' => 'Department not found',
            ], 404);
        }

        $department->name = $request->name;
        $department->description = $request->description;
        $department->save();

        return response([
            'message' => 'success',
            'data' => $department
        ], 200);
    }

    public function destroy($id)
    {
        $department = Department::find($id);
        if (!$department) {
            return response([
                'message' => 'Department not found',
            ], 404);
        }

        $department->delete();

        return response([
            'message' => 'success',
        ], 200);
    }
}
