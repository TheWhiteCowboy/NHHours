<?php namespace NHHours\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use NHHours\Models\Scopes\WorkingHoursScope;
use NHHours\Models\User;
use NHHours\Repositories\WorkingHoursRepository;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $workingHoursScope = (new WorkingHoursScope())->init();

        if($request->get('user')){
            $workingHoursScope->forUser($request->get('user'));
        }
        if($request->get('month') || $request->get('year')){
            $workingHoursScope->forDate($request->get('year'), $request->get('month'));
        }

        if(Auth::user()->hasRole('user')){
            $workingHoursScope->forUser(Auth::user()->id);
        }

        $workingHours = $workingHoursScope->query()->orderByDesc('date')->paginate(20);

        if ($request->ajax()) {
            return view('dashboard.load', ['workingHours' => $workingHours]);
        }

        $user = Auth::user();
        $userOptions = ['' => 'Geen gebruiker'] + User::all()->pluck('full_name', 'id')->toArray();
        $monthlyHours = (new WorkingHoursRepository())
            ->getWorkingHoursPerMonth(Auth::user()->id, Carbon::now()->month);

        return view('dashboard.index', ['workingHours' => $workingHours, 'monthlyHours' => $monthlyHours, 'userOptions' => $userOptions, 'user' => $user]);
    }
}