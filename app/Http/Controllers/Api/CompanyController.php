<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function editCompany(Request $request)
    {
        // 'name',
        //     'email',
        //     'logo',
        //     'website',
        //     'phone',
        //     'address',
        //     'status',
        //     'total_users',
        //     'clock_in_time',
        //     'clock_out_time',
        //     'early_clock_in_time',
        //     'allow_clock_out_till',
        //     'self_clocking',

        $company = Company::whereId(1)->first();
        if ($request->has('name')) {
            $company->name = $request->name;
            // $company->save();
        }

        if ($request->has('email')) {
            $company->email = $request->email;
            // $company->save();
        }

        if ($request->has('logo')) {
            $request->validate([
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('images'), $imageName);
            $company->logo = $imageName;
            // $company->save();
        }

        if ($request->has('website')) {
            $company->website = $request->website;
            // $company->save();
        }

        if ($request->has('phone')) {
            $company->phone = $request->phone;
            // $company->save();
        }

        if ($request->has('address')) {
            $company->address = $request->address;
            // $company->save();
        }

        if ($request->has('status')) {
            $company->status = $request->status;
            // $company->save();
        }

        if ($request->has('total_users')) {
            $company->total_user = $request->total_user;
            // $company->save();
        }

        if ($request->has('clock_in_time')) {
            $company->clock_in_time = $request->clock_in_time;
            // $company->save();
        }

        if ($request->has('clock_out_time')) {
            $company->clock_out_time = $request->clock_out_time;
            // $company->save();
        }

        if ($request->has('early_clock_in_time')) {
            $company->early_clock_in_time = $request->early_clock_in_time;
            // $company->save();
        }

        if ($request->has('allow_clock_out_till')) {
            $company->allow_clock_out_till = $request->allow_clock_out_till;
            // $company->save();
        }

        if ($request->has('self_clocking')) {
            $company->self_clocking = $request->self_clocking;
            // $company->save();
        }

        $company->save();

        return response([
            'message' => 'Company updated successfully',
            'company' => $company
        ], 200);
    }
}
