<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
        'leave_id',
        'leave_type_id',
        'holiday_id',
        'date',
        'is_holiday',
        'is_leave',
        'clock_in_datetime',
        'clock_out_datetime',
        'total_duration',
        'is_late',
        'is_half_day',
        'is_paid',
        'status',
        'reaseon',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function leave()
    {
        return $this->belongsTo(Leave::class);
    }

    public function holida()
    {
        return $this->belongsTo(Holiday::class);
    }

    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
