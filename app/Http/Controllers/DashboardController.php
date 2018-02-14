<?php namespace NHHours\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use NHHours\Models\Scopes\WorkingHoursScope;
use NHHours\Repositories\UserRepository;
use NHHours\Repositories\WorkingHoursRepository;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $workingHours = (new WorkingHoursScope())->init()

            //->forUser(Auth::user()->id)
            ->query()
            ->paginate(15);


        if ($request->ajax()) {
            return view('dashboard.load', ['workingHours' => $workingHours]);
        }

        $user = (new UserRepository())->read(Auth::user()->id);
        $monthlyHours = (new WorkingHoursRepository())
            ->getWorkingHoursPerMonth(Auth::user()->id, Carbon::now()->month);

        return view('dashboard.index', ['workingHours' => $workingHours, 'monthlyHours' => $monthlyHours, 'user' => $user]);
    }
}