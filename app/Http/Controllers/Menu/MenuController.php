<?php

namespace App\Http\Controllers\Menu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Menu;
use Auth;

class MenuController extends Controller
{
    public function store(Request $request){
        $menu = new Menu;
        $user = Auth::user()->role;
        
        $menu->nama_menu = $request->nama_menu;
        $menu->jenis     = $request->jenis;
        $menu->harga     = $request->harga;
        $menu->status    = $request->status;
        
        if($user == 'Pelayan' &&  $request->status != 1){
            return response([
                'success' => FALSE,
                'message'=>  'Only for Ready Menu'
            ],400)->header('Content-Type', 'application/json');
        }

        $menu->save();

        return response([
            'success' => TRUE,
            'message'=>  'Success to save data'
        ],201)->header('Content-Type', 'application/json');
    }

    public function index(){
        $menus = Menu::where('status',1)->get();
        
        return response([
            'success' => TRUE,
            'data'=>  $menus
        ],200)->header('Content-Type', 'application/json');
    }

    public function update(Request $request, $param){
        $menu = Menu::find($param);
        
        $menu->nama_menu = $request->nama_menu;
        $menu->jenis     = $request->jenis;
        $menu->harga     = $request->harga;
        $menu->status    = $request->status;
        
        $menu->save();
        
        return response([
            'success' => TRUE,
            'message'=>  'Success to edit data'
        ],200)->header('Content-Type', 'application/json');
    }

    public function delete($param){
        $menu = Menu::find($param);
        $menu->delete();

        return response([
            'success' => TRUE,
            'message'=>  'Data has been deleted'
        ],200)->header('Content-Type', 'application/json');
    }
}
