<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class MenuController extends Controller
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

        return view('menu.index', [
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
        //
    }

    public function createMenu()
    {
        $menuLast = DB::table('menus')
            ->select('Men_Id')
            ->where('Men_Tipo', 'MENU')
            ->orderByDesc('Men_Id')
            ->limit(1)
            ->get();

        foreach ($menuLast as $item) {
            $newMenuId = $item->Men_Id;
        }

        if($newMenuId==0 || $newMenuId==''){
            $newMenuId=1;
        }else{
            $newMenuId++;
        }

        return view('menu.create', [
            'newMenuId' => $newMenuId,
            'tipo' => 'MENU'
        ]);
    }

    public function createSubMenu( $idMenu )
    {
        $newMenuId=0;
        $menuLast = DB::table('menus')
            ->select(DB::raw('IFNULL(SUBSTRING(Men_Id, LOCATE(".",Men_Id)+1, CHAR_LENGTH(Men_Id)-LOCATE(".",Men_Id)),0) as partMenu'))
            ->where('Men_Id', 'like', $idMenu.'%')
            ->where('Men_Tipo', 'SUBMENU')
            ->orderByDesc('Men_Id')
            ->limit(1)
            ->get();

        foreach ($menuLast as $item) {
            $newMenuId = $item->partMenu;
        }

        if($newMenuId==0 || $newMenuId==''){
            $format=$idMenu.'.1';
        }else{
            $newMenuId++;
            $format=$idMenu.'.'.$newMenuId;
        }
        
        return view('menu.create', [
            'newMenuId' => $format,
            'tipo' => 'SUBMENU'
        ]);
    }

    public function createItem( $idSubMenu )
    {
        $newMenuId=0;
        $menuLast = DB::table('menus')
            ->select(DB::raw('SUBSTRING_INDEX(Men_Id, ".", -1) as partMenu'))
            ->where('Men_Id', 'like', $idSubMenu.'%')
            ->where('Men_Tipo', 'ITEM')
            ->orderByDesc('Men_Id')
            ->limit(1)
            ->get();

        foreach ($menuLast as $item) {
            $newMenuId = $item->partMenu;
        }

        if($newMenuId==0 || $newMenuId==''){
            $format=$idSubMenu.'.1';
        }else{
            $newMenuId++;
            $format=$idSubMenu.'.'.$newMenuId;
        }
        
        return view('menu.create', [
            'newMenuId' => $format,
            'tipo' => 'ITEM'
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
        $datosMenu = request()->except('_token');

        if(request()->hasFile('Men_Icono')){
            $datosMenu['Men_Icono']=request()->file('Men_Icono')->store('uploads', 'public');
        }    

        Menu::insert($datosMenu);
        return redirect('menu')->with('mensaje','Menu agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu=Menu::findOrFail($id);
        return view('menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosMenu = request()->except('_token','_method');

        if(request()->hasFile('Men_Icono')){
            $menu = Menu::findorFail($id);

            Storage::delete('public/'.$menu->Men_Icono);

            $datosMenu['Men_Icono']=$request->file('Men_Icono')->store('uploads','public');
        }

        Menu::where('id','=',$id)->update($datosMenu);

        $menu=Menu::findOrFail($id);
        return view('menu.edit', compact('menu'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu=Menu::findOrFail($id);
        if(Storage::delete('public/'.$menu->Men_Icono)){
            Menu::destroy($id);
        }
        
        return redirect('menu')->with('mensaje','Borrado Correctamente');
    }


     public function searchMenu($tipoBusq)
     {
         $menus = DB::select("CALL search_menu5('".$tipoBusq."')");
         //return view('rol.index', compact('menus'));
         return $menus;
     }
}
