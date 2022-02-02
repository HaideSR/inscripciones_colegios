<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\CarnetIdentidad;
use App\Models\Persona;
use App\Models\Secretario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\UsuarioAdministrador;

class UsuarioController extends Controller{
    public function index()
    {
        $usuarios =  UsuarioAdministrador::select()
                        ->leftJoin('secretario as S', 'usuario_administrador.id_secretario', '=', 'S.id')
                        ->leftJoin('persona as P', 'S.id_persona', '=', 'P.id')
                        ->select('P.nombres','P.apellido_paterno', 'P.apellido_materno',
                            'usuario_administrador.rol', 'usuario_administrador.nombre_usuario', 'usuario_administrador.password',
                            'usuario_administrador.id',
                            'S.correo', 'S.nitem'
                            )
                        ->get();

        return view('administrador.usuarios.index')->with('usuarios', $usuarios);
    }
    public function create()
    {
        return view('administrador.usuarios.create');
    }

    public function store(Request $request)
    {
        $ci = new CarnetIdentidad();
        $ci->timestamps = false;
        $ci->ci = $request->get('ci');
        $ci->complemento = 'NG';
        $ci->save();
        $idCarnet = $ci->id;

        $persona = new Persona();
        $persona->timestamps = false;
        $persona->nombres = $request->get('nombres');
        $persona->sexo = $request->get('sexo');
        $persona->fecha_nacimiento = $request->get('fecha_nacimiento');
        $persona->celular = $request->get('celular');
        $persona->apellido_materno = $request->get('apellido_materno');
        $persona->apellido_paterno = $request->get('apellido_paterno');
        $persona->id_ci = $idCarnet;

        $persona->save();
        $idPersona = $persona->id;

        //
        $secretario = new Secretario();
        $secretario->timestamps = false;
        $secretario->correo = $request->get('correo');
        $secretario->nitem = $request->get('nitem');
        $secretario->activo = true;
        $secretario->id_persona = $idPersona;
        $secretario->save();
        $idSecretario = $secretario->id;

        //
        $secretario = new UsuarioAdministrador();
        $secretario->timestamps = false;
        $secretario->password = $request->get('password');
        $secretario->nombre_usuario = $request->get('nombre_usuario');
        $secretario->rol = $request->get('rol');
        $secretario->id_secretario = $idSecretario;
        $secretario->save();

        return redirect('/administrador/usuarios');


    }
    public function edit($id)
    {
        $usuario =  UsuarioAdministrador::select()
                ->leftJoin('secretario as S', 'usuario_administrador.id_secretario', '=', 'S.id')
                ->leftJoin('persona as P', 'S.id_persona', '=', 'P.id')
                ->leftJoin('carnet_identidad as C', 'P.id_ci', '=', 'C.id')
                ->where('usuario_administrador.id','=', $id)
                ->select('P.nombres','P.apellido_paterno', 'P.apellido_materno', 'P.sexo', 'P.fecha_nacimiento', 'P.celular',
                    'usuario_administrador.id',
                    'usuario_administrador.rol', 'usuario_administrador.nombre_usuario', 'usuario_administrador.password',
                      'S.correo', 'S.nitem', 'C.ci',
                    )
                ->first();
        return view('administrador.usuarios.edit')->with('usuario', $usuario);
    }
    public function update(Request $request, $id)
    {
        $usuario = UsuarioAdministrador::find($id);
        $usuario->password = $request->get('password');
        $usuario->nombre_usuario = $request->get('nombre_usuario');
        $usuario->rol = $request->get('rol');
        $usuario->update();
        $idSecretario=$usuario->id_secretario;

        $secretario = Secretario::find($idSecretario);
        $secretario->nitem = $request->get('nitem');
        $secretario->correo = $request->get('correo');
        $secretario->update();
        $idPersona=$secretario->id_persona;

        $persona =Persona::find($idPersona);
        $persona->nombres = $request->get('nombres');
        $persona->apellido_materno = $request->get('apellido_materno');
        $persona->apellido_paterno = $request->get('apellido_paterno');
        $persona->sexo = $request->get('sexo');
        $persona->fecha_nacimiento = $request->get('fecha_nacimiento');
        $persona->celular = $request->get('celular');
        $idCarnet=$persona->id_ci;
        $persona->update();
        $idPersona=$persona->id;

         //CI
        $ci = CarnetIdentidad::find($idCarnet);
        $ci->ci = $request->get('ci');
        $ci->complemento = $request->get('complemento');
        $ci->update();

        return redirect('/administrador/usuarios');
    }

    function login(){
        return view('login.login');
    }
    function register(){
       // return view('login.registro');
    }
    function save(Request $request){
        //Validate requests
        // return $request->input();
        $request->validate([
            'nombre'=>'required',
            'nombre_usuario'=>'required|min:4|unique:usuario_administrador',
            'password'=>'required|min:4|max:12'
        ]);

         //Insert data into database
         $admin = new UsuarioAdministrador;
         $admin->nombre = $request->nombre;
         $admin->nombre_usuario = $request->nombre_usuario;
         $admin->password = Hash::make($request->password);
         $save = $admin->save();
         if($save){
            return back()->with('success','Se registro correctamente');
         }else{
            return back()->with('fail','Error al registrar');
         }
    }

    function inlogin(Request $request){
        return $request-> input();
    }
    function ingresar(Request $request){
        // return $request-> input();
        $request->validate([
            'nombre_usuario'=>'required|min:4',
            'password'=>'required|min:4|max:12'
        ]);
        // $userInfo = UsuarioAdministrador::where('nombre_usuario','=', $request->nombre_usuario)->first();
        $userInfo =  UsuarioAdministrador::select()
                    ->leftJoin('secretario as S', 'usuario_administrador.id_secretario', '=', 'S.id')
                    ->leftJoin('persona as P', 'S.id_persona', '=', 'P.id')
                    ->where('usuario_administrador.nombre_usuario','=', $request->nombre_usuario)
                    ->select('P.nombres','P.apellido_paterno', 'P.apellido_materno',
                        'usuario_administrador.rol', 'usuario_administrador.password',
                        'S.id as id_secretario'
                        )
                    ->first();
        if(!$userInfo){
            return back()->with('fail','Verifique se sus datos sean correctos');
        }else{
            if($request->password == $userInfo->password){
                $request->session()->put('usuarioSesion', $userInfo->nombres . $userInfo->apellido_apterno );
                $request->session()->put('rol', $userInfo->rol);
                $request->session()->put('idUser', $userInfo->id_secretario);
                return redirect('/administrador');
            }else{
                return back()->with('fail','Verifique se sus datos sean correctos');
            }
        }
    }

    function indexPage(){
        $data = ['UsuarioSession' => UsuarioAdministrador::where('id','=', session('LoggedUser'))->first()];

        return view('administrador.index', $data);
    }

    function logout(Request $request){
        // if(session()->has('LoggedUser')){
            $request->session()->flush();
            return redirect('/');
        // }
    }

    public function destroy($id)
    {
        $usuario = UsuarioAdministrador::find($id);
        $usuario->delete();
        return redirect('/administrador/usuarios');
    }
}


