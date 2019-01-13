<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Validator;

;

class AdminsController extends Controller
{
    public function index()
    {
        $admins = User::all();
        return view('/admins/index', ['admins' => $admins]);
    }

    // Страница добавления нового адинистратора
    public function newAdmin()
    {
        return view('/admins/addadmin');
    }

    // Добавление нового администратора
    public function addAdmin(Request $request)
    {

        $validatior = Validator::make($request->all(), [
            'login' => 'required|max:50',
            'email' => 'required',
            'password' => 'required|min:6'
        ]);

        if ($validatior->fails()) {
            return redirect('addadmin')
                ->withInput()
                ->withErrors($validatior);
        }

        $admin = new User();
        $admin->name = $request->login;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->save();


        return redirect('/admins');
    }

    // изменение пароля администраторов
    public function adminChangePass(Request $request)
    {
        DB::table('users')
            ->where('id', '=', $request->id)
            ->update(['password' => bcrypt($request->newAdminPass)]);

        return redirect('/admins');
    }

    // удаляем администратора
    public function delAdmin(Request $request) // удаление администратора
    {
        DB::table('users')
            ->where('id', '=', $request->id)
            ->delete();

        return redirect('/admins');
    }
}