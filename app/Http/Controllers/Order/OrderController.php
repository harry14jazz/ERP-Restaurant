<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;
use App\Models\Meja;
use Auth;
use DateTime;

class OrderController extends Controller
{
    public function store(Request $request){
        $order = new Order;
        $user = Auth::user()->id;
        
        $date = date('dmY');
        
        $order->order_number    = 'ERP'.$date;
        $order->user_id         = $user;
        $order->meja_id         = $request->meja_id;
        $order->menu_id         = $request->menu_id;
        $order->status          = $request->status;
        
        $order->save();

        return response([
            'success' => TRUE,
            'message'=>  'Success to save data'
        ],201)->header('Content-Type', 'application/json');
    }

    public function index(){
        $orders = Order::where('status',1)->get();
        
        return response([
            'success' => TRUE,
            'data'=>  $orders
        ],200)->header('Content-Type', 'application/json');
    }

    public function update(Request $request, $param){
        $order = Order::find($param);
        
        $order->order_number    = $request->get('order_number');
        $order->user_id         = $request->get('user_id');
        $order->meja_id         = $request->get('meja_id');
        $order->menu_id         = $request->get('menu_id');
        $order->status          = $request->get('status');
        
        $order->save();
        
        return response([
            'success' => TRUE,
            'message'=>  'Success to edit data'
        ],200)->header('Content-Type', 'application/json');
    }

    public function delete($param){
        $order = Order::find($param);
        $order->delete();

        return response([
            'success' => TRUE,
            'message'=>  'Data has been deleted'
        ],200)->header('Content-Type', 'application/json');
    }

    public function payment(Request $request){ //error
        $orders = Order::with('menu')->where('status',1)->get();
        
        foreach($orders as $row){
            $harga = $row->menu->harga++;
        }

        return response([   
            'success' => TRUE,
            'message'=>  'Success to edit data'
        ],200)->header('Content-Type', 'application/json');
    }

    public function recap(){
        $user = Auth::user()->id;
        $orders = Order::with('menu')->where([['user_id', $user], ['status',1]])->get();

        return response([
            'success' => TRUE,
            'data'=>  $orders
        ],200)->header('Content-Type', 'application/json');
    }
}
