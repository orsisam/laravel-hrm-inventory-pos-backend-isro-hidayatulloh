<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::all();
        return response([
            'status' => 'success',
            'message' => 'Attendances fetched successfully',
            'data' => $attendances
        ], 200);
    }

    // store
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'leave_id' => 'nullable',
            'leave_type_id' => 'nullable',
            'holiday_id' => 'nullable',
            'date' => 'required',
            'is_holiday' => 'nullable',
            'is_leave' => 'nullable',
            'clock_in_datetime' => 'required',
            'clock_out_datetime' => 'nullable',
            'total_duration' => 'nullable',
            'is_late' => 'nullable',
            'is_half_day' => 'nullable',
            'is_paid' => 'nullable',
            'status' => 'nullable',
            'reason' => 'nullable',
        ]);

        $attendance = new Attendance();
        $attendance->user_id = $request->user_id;
        $attendance->company_id = 1;
        $attendance->leave_id = $request->leave_id;
        $attendance->leave_type_id = $request->leave_type_id;
        $attendance->holiday_id = $request->holiday_id;
        $attendance->date = $request->date;
        $attendance->is_holiday = $request->is_holiday;
        $attendance->is_leave = $request->is_leave;
        $attendance->clock_in_datetime = $request->clock_in_datetime;
        $attendance->clock_out_datetime = $request->clock_out_datetime;
        $attendance->total_duration = $request->total_duration;
        $attendance->is_late = $request->is_late;
        $attendance->is_half_day = $request->is_half_day;
        $attendance->is_paid = $request->is_paid;
        $attendance->status = $request->status;
        $attendance->reason = $request->reason;
        $attendance->save();

        return response([
            'status' => 'success',
            'message' => 'Attendance created successfully',
            'data' => $attendance
        ], 201);
    }

    // show
    public function show($id)
    {
        $attendance = Attendance::find($id);
        if (! $attendance) {
            return response([
                'status' => 'error',
                'message' => 'Attendance not found',
            ], 404);
        }

        return response([
            'status' => 'success',
            'message' => 'Attendance fetched successfully',
            'data' => $attendance
        ], 200);
    }

    // update
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'leave_id' => 'nullable',
            'leave_type_id' => 'nullable',
            'holiday_id' => 'nullable',
            'date' => 'required',
            'is_holiday' => 'nullable',
            'is_leave' => 'nullable',
            'clock_in_datetime' => 'required',
            'clock_out_datetime' => 'nullable',
            'total_duration' => 'nullable',
            'is_late' => 'nullable',
            'is_half_day' => 'nullable',
            'is_paid' => 'nullable',
            'status' => 'nullable',
            'reason' => 'nullable',
        ]);

        $attendance = Attendance::find($id);
        if (! $attendance) {
            return response([
                'status' => 'error',
                'message' => 'Attendance not found',
            ], 404);
        }

        $attendance->user_id = $request->user_id;
        $attendance->company_id = 1;
        $attendance->leave_id = $request->leave_id;
        $attendance->leave_type_id = $request->leave_type_id;
        $attendance->holiday_id = $request->holiday_id;
        $attendance->date = $request->date;
        $attendance->is_holiday = $request->is_holiday;
        $attendance->is_leave = $request->is_leave;
        $attendance->clock_in_datetime = $request->clock_in_datetime;
        $attendance->clock_out_datetime = $request->clock_out_datetime;
        $attendance->total_duration = $request->total_duration;
        $attendance->is_late = $request->is_late;
        $attendance->is_half_day = $request->is_half_day;
        $attendance->is_paid = $request->is_paid;
        $attendance->status = $request->status;
        $attendance->reason = $request->reason;
        $attendance->save();

        return response([
            'status' => 'success',
            'message' => 'Attendance updated successfully',
            'data' => $attendance
        ], 200);
    }

    // deestroy
    public function destroy($id)
    {
        $attendance = attendance::find($id);
        if (!$attendance) {
            return response([
                'status' => 'error',
                'message' => 'Attendance not found',
            ], 404);
        }

        $attendance->delete();

        return response([
            'status' => 'success',
            'message' => 'Attendance deleted successfully',
        ], 200);
    }
}
