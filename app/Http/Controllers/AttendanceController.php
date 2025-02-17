<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::where('employee_id', Auth::id())->latest()->get();
        return view('attendance.index', compact('attendances'));
    }

    public function toggleAttendance()
    {
        $employeeId = Auth::id();
        $currentAttendance = Attendance::where('employee_id', $employeeId)
            ->whereNull('check_out')
            ->latest()
            ->first();

        if ($currentAttendance) {
            // If employee has already checked in, log the checkout
            $currentAttendance->update(['check_out' => Carbon::now()]);
            return back()->with('success', 'Checked Out Successfully!');
        } else {
            // If not checked in, create a new attendance record
            Attendance::create([
                'employee_id' => $employeeId,
                'check_in' => Carbon::now(),
            ]);
            return back()->with('success', 'Checked In Successfully!');
        }
    }
    
}

