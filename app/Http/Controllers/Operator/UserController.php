<?php namespace App\Http\Controllers\Operator;

use App\Http\Controllers\OperatorController;
use App\User;
use App\Http\Requests\Operator\UserEditRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;


class UserController extends OperatorController {

    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        return view('operator.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $user
     * @return Response
     */
    public function getEdit($id) {

        $user = User::find($id);
        return view('operator.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $user
     * @return Response
     */
    public function postEdit(UserEditRequest $request, $id) {

        $user = User::find($id);
        $user -> name = $request->name;
        $user -> username = $request->username;
        $user -> email = $request->email;

        $password = $request->password;
        $passwordConfirmation = $request->password_confirmation;

        if (!empty($password)) {
            if ($password === $passwordConfirmation) {
                $user -> password = bcrypt($password);
            }
        }

        $user -> save();
    }
    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $id = Auth::user()->id;
        $user = User::select(array(
            'users.id',
            'users.name',
            'users.username',
            'users.email',
            'users.confirmed',
            'users.admin',
            'users.created_at'))->where('users.id' ,'=', $id);
        return Datatables::of($user)
            ->edit_column('admin', '@if ($admin=="1") Admin @else Operator @endif')
            ->edit_column('confirmed', '@if ($confirmed=="1") Yes @else No @endif')
            ->add_column('actions', '<a href="{{{ URL::to(\'operator/users/\' . $id . \'/edit\' ) }}}" class="btn btn-warning btn-xs iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a>')
            ->remove_column('id')
            ->make();
    }

}
