<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BasicSalary;
use Illuminate\Http\Request;

class BasicSalaryController extends Controller
{
    public function index()
    {
        $basicSalary = BasicSalary::all();
        return response([
            'message' => 'Basic Salary List',
            'data' => $basicSalary
        ], 200);
    }

    // store
    public function store(Request $request)
    {
        $request->validate([
            'basic_salary' => 'required',
            'user_id' => 'required',
        ]);

        $user = $request->user();

        $basicSalary = new BasicSalary();
        $basicSalary->company_id = $user->company_id;
        $basicSalary->user_id = $request->user_id;
        $basicSalary->basic_salary = $request->basic_salary;
        $basicSalary->save();

        return response([
            'message' => 'Basic Salary created successfully',
            'data' => $basicSalary
        ], 201);
    }

    public function show($id)
    {
        $basicSalary = BasicSalary::find($id);
        if (!$basicSalary) {
            return response([
                'message' => 'Basic Salary not found',
            ], 404);
        }

        return response([
            'message' => 'Basic Salary found',
            'data' => $basicSalary
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'basic_salary' => 'required',
            'user_id' => 'required',
        ]);

        $basicSalary = BasicSalary::find($id);
        if (!$basicSalary) {
            return response([
                'message' => 'Basic Salary not found',
            ], 404);
        }

        $basicSalary->basic_salary = $request->basic_salary;
        $basicSalary->user_id = $request->user_id;
        $basicSalary->save();

        return response([
            'message' => 'Basic Salary updated successfully',
            'data' => $basicSalary
        ], 200);
    }

    public function destroy($id)
    {
        $basicSalary = BasicSalary::find($id);
        if (!$basicSalary) {
            return response([
                'message' => 'Basic Salary not found',
            ], 404);
        }

        $basicSalary->delete();

        return response([
            'message' => 'success',
        ], 200);
    }
}
