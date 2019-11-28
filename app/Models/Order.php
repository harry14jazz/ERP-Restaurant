<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Menu;
use App\Models\Meja;

class Order extends Model
{
    protected $table = 'order';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_number','user_id','meja_id','menu_id','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at','updated_at'
    ];

    public function user(){
        return $this->belongsTo(new User);
    }

    public function meja(){
        return $this->belongsTo(new Meja);
    }
    
    public function menu(){
        return $this->belongsTo(new Menu);
    }

}
