<?php namespace NHHours\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use NHHours\Models\Department;
use NHHours\Models\Scopes\DepartmentScope;
use NHHours\Repositories\DepartmentFactory;

class DepartmentsController extends Controller
{
    public function index()
    {
        $departments = (new DepartmentScope())->init()->forCompany(Auth::user()->company_id)->query()->get();

        return view('departments.index', ['departments' => $departments]);
    }

    public function save(Request $request, $company_id)
    {
        $validator = Department::validate($request->all());

        if ($validator->fails()) {
            return Response::json($validator->errors(), 400);
        }

        (new DepartmentFactory())->create($company_id, $request->all());

        return Response::json([], 200);
    }
}