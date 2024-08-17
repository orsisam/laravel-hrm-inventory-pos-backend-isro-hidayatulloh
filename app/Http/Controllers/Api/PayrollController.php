<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payroll;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function index()
    {
        $payrolls = Payroll::all();

        return response([
            'messsage' => 'Payroll List',
            'data' => $payrolls
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'month' => 'required',
            'year' => 'required',
            'basic_salary' => 'required',
            'salary_amount' => 'required',
            'net_salary' => 'required',
            'total_days' => 'required',
            'working_days' => 'required',
            'present_days' => 'required',
            'total_office_time' => 'required',
            'total_worked_time' => 'required',
            'half_days' => 'required',
            'late_days' => 'required',
            'paid_leaves' => 'required',
            'unpaid_leaves' => 'required',
            'holiday_count' => 'required',
            'paymant_date' => 'nullable',
        ]);

        $payroll = new Payroll();
        $payroll->user_id = $request->user_id;
        $payroll->month = $request->month;
        $payroll->year = $request->year;
        $payroll->basic_salary = $request->basic_salary;
        $payroll->salary_amount = $request->salary_amount;
        $payroll->net_salary = $request->net_salary;
        $payroll->total_days = $request->total_days;
        $payroll->working_days = $request->working_days;
        $payroll->present_days = $request->present_days;
        $payroll->total_office_time = $request->total_office_time;
        $payroll->total_worked_time = $request->total_worked_time;
        $payroll->half_days = $request->half_days;
        $payroll->late_days = $request->late_days;
        $payroll->paid_leaves = $request->paid_leaves;
        $payroll->unpaid_leaves = $request->unpaid_leaves;
        $payroll->holiday_count = $request->holiday_count;
        $payroll->paymant_date = $request->paymant_date;
        $payroll->save();

        return response([
            'message' => 'Payroll created successfully',
            'data' => $payroll
        ], 201);
    }

    public function show($id)
    {
        $payroll = Payroll::find($id);

        if (!$payroll) {
            return response([
                'message' => 'Payroll not found',
            ], 404);
        }

        return response([
            'message' => 'Payroll fetched successfully',
            'data' => $payroll
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'month' => 'required',
            'year' => 'required',
            'basic_salary' => 'required',
            'salary_amount' => 'required',
            'net_salary' => 'required',
            'total_days' => 'required',
            'working_days' => 'required',
            'present_days' => 'required',
            'total_office_time' => 'required',
            'total_worked_time' => 'required',
            'half_days' => 'required',
            'late_days' => 'required',
            'paid_leaves' => 'required',
            'unpaid_leaves' => 'required',
            'holiday_count' => 'required',
            'paymant_date' => 'nullable',
        ]);

        $payroll = Payroll::find($id);
        if (! $payroll) {
            return response([
                'message' => 'Payroll not found',
            ], 404);
        }

        $payroll->user_id = $request->user_id;
        $payroll->month = $request->month;
        $payroll->year = $request->year;
        $payroll->basic_salary = $request->basic_salary;
        $payroll->salary_amount = $request->salary_amount;
        $payroll->net_salary = $request->net_salary;
        $payroll->total_days = $request->total_days;
        $payroll->working_days = $request->working_days;
        $payroll->present_days = $request->present_days;
        $payroll->total_office_time = $request->total_office_time;
        $payroll->total_worked_time = $request->total_worked_time;
        $payroll->half_days = $request->half_days;
        $payroll->late_days = $request->late_days;
        $payroll->paid_leaves = $request->paid_leaves;
        $payroll->unpaid_leaves = $request->unpaid_leaves;
        $payroll->holiday_count = $request->holiday_count;
        $payroll->paymant_date = $request->paymant_date;
        $payroll->save();

        return response([
            'message' => 'Payroll updated successfully',
            'data' => $payroll
        ], 200);
    }

    public function destroy($id)
    {
        $payroll = Payroll::find($id);
        if (! $payroll) {
            return response([
                'message' => 'Payroll not found',
            ], 404);
        }

        $payroll->delete();
        return response([
            'message' => 'Payroll deleted successfully',
        ], 200);
    }
}
