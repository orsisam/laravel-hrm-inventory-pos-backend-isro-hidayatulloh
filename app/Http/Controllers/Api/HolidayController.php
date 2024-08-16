<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function index()
    {
        $holdays = Holiday::all();
        return response([
            'message' => 'Holiday List',
            'data' => $holdays
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'month' => 'required',
            'year' => 'required',
            'date' => 'required',
            'is_weekend' => 'required',
        ]);

        $holiday = new Holiday();
        $holiday->company_id = 1;
        $holiday->name = $request->name;
        $holiday->month = $request->month;
        $holiday->year = $request->year;
        $holiday->date = $request->date;
        $holiday->is_weekend = $request->is_weekend;
        $holiday->created_by = $request->user()->id;
        $holiday->save();

        return response([
            'message' => 'Holiday created successfully',
            'data' => $holiday
        ], 201);
    }

    public function show($id)
    {
        $holiday = Holiday::find($id);
        if (!$holiday) {
            return response([
                'message' => 'Holiday not found',
            ], 404);
        }

        return response([
            'message' => 'Holiday details',
            'data' => $holiday
        ], 200);
    }

    // update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'month' => 'required',
            'year' => 'required',
            'date' => 'required',
            'is_weekend' => 'required',
        ]);

        $holiday = Holiday::find($id);
        if (!$holiday) {
            return response([
                'message' => 'Holiday not found',
            ], 404);
        }

        $holiday->name = $request->name;
        $holiday->month = $request->month;
        $holiday->year = $request->year;
        $holiday->date = $request->date;
        $holiday->is_weekend = $request->is_weekend;
        $holiday->created_by = $request->user()->id;
        $holiday->save();

        return response([
            'message' => 'Holiday updated successfully',
            'data' => $holiday
        ], 200);
    }

    // destroy
    public function destroy($id)
    {
        $holiday = Holiday::find($id);
        if (!$holiday) {
            return response([
                'message' => 'Holiday not found',
            ], 404);
        }

        $holiday->delete();

        return response([
            'message' => 'Holiday deleted successfully',
        ], 200);
    }
}
