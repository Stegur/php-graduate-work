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
    
    
    public function newAdmin() // Страница добавления нового адинистратора
    {
        
        return view('/admins/addadmin');
    }
    
    public function addAdmin(Request $request) // Добавление нового администратора
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
//        todo как отлавливать ошибки при создании нового администратора, email существует
        
        $admin = new User();
        $admin->name = $request->login;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->save();

//       todo $newAdminSuccess = 'Вы успешно добавили нового администратора';
        
        return redirect('/admins');
    }

//    Изменение пароля администраторов
    
    public function adminChangePass(Request $request)
    {
        DB::table('users')
            ->where('id', '=', $request->id)
            ->update(['password' => bcrypt($request->newAdminPass)]);
        
        return redirect('/admins');
    }
    
    public function delAdmin(Request $request) // удаление администратора
    {
        DB::table('users')
            ->where('id', '=', $request->id)
            ->delete();
        
        return redirect('/admins');
    }
}