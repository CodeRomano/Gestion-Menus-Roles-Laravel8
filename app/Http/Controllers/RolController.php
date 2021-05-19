<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Menu;
use App\Models\menurol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = DB::select("CALL search_menu5('MENU')");
        $submenus = DB::select("CALL search_menu5('SUBMENU')");
        $items = DB::select("CALL search_menu5('ITEM')");

        return view('rol.index', [
            'roles' => Rol::all(),
            'menus' => $menus,
            'submenus' => $submenus,
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = DB::select("CALL search_menu5('MENU')");
        $submenus = DB::select("CALL search_menu5('SUBMENU')");
        $items = DB::select("CALL search_menu5('ITEM')");
        $checkOn = array();
        
        return view('rol.create', [
            'menus' => $menus,
            'submenus' => $submenus,
            'items' => $items,
            'checkOn' => $checkOn,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosRol = request()->except('_token', 'arrayMenus'); 
        $arrayMenu = request()->input('arrayMenus');
        $rolSistema = request()->input('Rol_Sistema');
        $rolId = request()->input('Rol_Id');

        foreach ($arrayMenu as $key=>$value) {
            $tmp['Sistema'] = $rolSistema;
            $tmp['Rol_Id'] = $rolId;
            $tmp['Men_Id'] = $key;
            $nuevoArray[]=$tmp;
        }

        Rol::insert($datosRol);
        menurol::insert($nuevoArray);        

        return redirect('rol')->with('mensaje','Rol agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show(Rol $rol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menus = DB::select("CALL search_menu5('MENU')");
        $submenus = DB::select("CALL search_menu5('SUBMENU')");
        $items = DB::select("CALL search_menu5('ITEM')");
        $rolUnico = Rol::findOrFail($id);

        $checkOn = DB::table('menurols')->where('Rol_ID', '=', $rolUnico->Rol_Id)->get();

        return view('rol.edit', [
            'rol' => Rol::findOrFail($id),
            'menus' => $menus,
            'submenus' => $submenus,
            'items' => $items,
            'checkOn' => $checkOn,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $datosRol = request()->except('_token','_method', 'arrayMenus');
        $arrayMenu = request()->input('arrayMenus');
        $rolSistema = request()->input('Rol_Sistema');
        $rolId = request()->input('Rol_Id');

        foreach ($arrayMenu as $key=>$value) {
            $tmp['Sistema'] = $rolSistema;
            $tmp['Rol_Id'] = $rolId;
            $tmp['Men_Id'] = $key;
            $nuevoArray[]=$tmp;
        }

        Rol::where('id','=',$id)->update($datosRol);
        DB::table('menurols')->where('Rol_Id', '=', $rolId)->delete();
        menurol::insert($nuevoArray);
        
        $menus = DB::select("CALL search_menu5('MENU')");
        $submenus = DB::select("CALL search_menu5('SUBMENU')");
        $items = DB::select("CALL search_menu5('ITEM')");

        $checkOn = DB::table('menurols')->where('Rol_Id', '=', $rolId)->get();

        return view('rol.edit', [
            'rol' => Rol::findOrFail($id),
            'menus' => $menus,
            'submenus' => $submenus,
            'items' => $items,
            'checkOn' => $checkOn,
        ])->with('mensaje','Rol Actualizado con éxito');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$rol=Rol::findOrFail($id);
        //if(Storage::delete('public/'.$menu->Men_Icono)){
            Rol::destroy($id);
        //}
        
        return redirect('rol')->with('mensaje','Borrado Correctamente');
    }

    // public static function searchMenu($tipoBusq, $valorBusq)
    // {
    //     $menus = DB::select("CALL search_menu5('".$tipoBusq."','".$valorBusq."')");
    //     return view('rol.edit', compact('menus'));
    // }
}
