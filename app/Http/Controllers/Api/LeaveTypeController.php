<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    /**
     * Handles HTTP requests to retrieve all leave types.
     *
     * @return \Illuminate\Http\Response A successful response containing all leave types.
     */
    public function index()
    {
        $leaveTypes = LeaveType::all();

        return response([
            'status' => 'success',
            'message' => 'Leave Types fetched successfully',
            'data' => $leaveTypes
        ], 200);
    }


    /**
     * Handles HTTP requests to create a new leave type.
     *
     * @param Request $request The incoming HTTP request containing the leave type data.
     * @return \Illuminate\Http\Response A successful response containing the newly created leave type.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'is_paid' => 'required',
            'total_leaves' => 'required',
            'max_leaves_per_month' => 'nullable',
        ]);

        $leaveTypes = new LeaveType();
        $leaveTypes->company_id = 1;
        $leaveTypes->name = $request->name;
        $leaveTypes->is_paid = $request->is_paid;
        $leaveTypes->total_leaves = $request->total_leaves;
        $leaveTypes->max_leaves_per_month = $request->max_leaves_per_month;
        $leaveTypes->created_by = $request->user()->id;
        $leaveTypes->save();

        return response([
            'status' => 'success',
            'message' => 'Leave Type created successfully',
            'data' => $leaveTypes
        ], 201);
    }


    /**
     * Retrieves a single LeaveType by its ID.
     *
     * @param int $id The ID of the LeaveType to retrieve.
     * @return \Illuminate\Http\Response The response containing the LeaveType data if found, or an error message if not found.
     */
    public function show($id)
    {
        $leaveType = LeaveType::find($id);

        if (! $leaveType) {
            return response([
                'status' => 'error',
                'message' => 'Leave Type not found',
            ], 404);
        }

        return response([
            'status' => 'success',
            'message' => 'Leave Type fetched successfully',
            'data' => $leaveType
        ], 200);
    }


    /**
     * Updates an existing LeaveType by its ID.
     *
     * @param Request $request The incoming HTTP request containing the updated LeaveType data.
     * @param int $id The ID of the LeaveType to update.
     * @throws \Illuminate\Validation\ValidationException If the request data is invalid.
     * @return \Illuminate\Http\Response The response containing the updated LeaveType data if successful, or an error message if the LeaveType is not found.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'is_paid' => 'required',
            'total_leaves' => 'required',
            'max_leaves_per_month' => 'nullable',
        ]);

        $leaveType = LeaveType::find($id);
        if (! $leaveType) {
            return response([
                'status' => 'error',
                'message' => 'Leave Type not found',
            ], 404);
        }

        $leaveType->name = $request->name;
        $leaveType->is_paid = $request->is_paid;
        $leaveType->total_leaves = $request->total_leaves;
        $leaveType->max_leaves_per_month = $request->max_leaves_per_month;
        $leaveType->created_by = $request->user()->id;
        $leaveType->save();

        return response([
            'status' => 'success',
            'message' => 'Leave Type updated successfully',
            'data' => $leaveType
        ], 200);
    }

    /**
     * Handles HTTP requests to delete a leave type by its ID.
     *
     * @param int $id The ID of the leave type to delete.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the leave type is not found.
     * @return \Illuminate\Http\Response A successful response containing a success message, or an error message if the leave type is not found.
     */

    public function destroy($id)
    {
        $leaveType = LeaveType::find($id);
        if (! $leaveType) {
            return response([
                'status' => 'error',
                'message' => 'Leave Type not found',
            ], 404);
        }
        $leaveType->delete();
        return response([
            'status' => 'success',
            'message' => 'Leave Type deleted successfully',
        ], 200);
    }
}
