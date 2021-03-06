<?php namespace NHHours\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use NHHours\Models\Scopes\DepartmentScope;
use NHHours\Models\User;
use NHHours\Repositories\UserRepository;

class UsersController extends Controller
{
    public function index()
    {
        $user = (new UserRepository())->read(Auth::user()->id);
        $departments = (new DepartmentScope())->init()->forCompany(Auth::user()->company_id)->query()->get();

        return view('users.index', ['user' => $user, 'departments' => $departments]);
    }

    public function update(Request $request, $id)
    {
        $user = (new UserRepository())->read($id);
        $validator = User::validateUpdate($request->all());

        if ($validator->fails()) {
            return Response::json($validator->errors(), 400);
        }

        return Response::json([], 200);
    }
}