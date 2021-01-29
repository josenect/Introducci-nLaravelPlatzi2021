<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserControlller extends Controller
{

    public function index()
    {
        $users= User::latest()->get();  ///se consultan los datos en la bae de datos 
 
        return view ('users.index',[   // se retorna una vista y el array con los datos de la consulta
                'users'=>$users   // array que va a tener que estar definido en la vista 'users'
        ]);
    }



    public function store(Request $request)
    {
         
        User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            
        ]);   

        return back();
    }


     
    public function destroy(User $user) // se pasa el objecto competo al metodo el realizar esta forma  el motodo busca ese user en la BD
    {
        //

        $user->delete();  // se ejecuta el metodo de eliminar 
        return back(); // nos devolvemos a la pagian anterior 
    } 
}
