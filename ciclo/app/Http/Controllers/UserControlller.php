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
        $request->validate([                                  // validacion de la data o objecto que llega 
            'name'=>'required',                              // aplica que el nombre sea requerido
            'email'=>['required','email','unique:users'],    // aplica que el email sea requerido , que sea de tipo email y que ese email sea unico en la tabla user de la BD
            'password' => ['required','min:8']               // aplica que sea requerido y que sea minimo de 8 carateres 

        ]);


        User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)   // encriptacion de clave por un metodo de laravel
            
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
