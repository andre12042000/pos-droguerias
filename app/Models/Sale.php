<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $guarded= ['id'];

    public function credit()
    {
        return $this->hasOne(Credit::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function saleDetails(){
        return $this->hasMany(SaleDetail::class, 'sale_id');
    }

    public function metodopago()
    {
        return $this->belongsTo(MetodoPago::class, 'metodo_pago_id');
    }

    //relacion polimorfica con cash

    public function cashs()
    {
        return $this->morphMany('App\Models\Cash', 'cashesable');
    }

    public function scopeSearch($query, $search)
    {
        if($search){
            return $query->where('full_nro', 'like', "%" . $search . "%");
        }else{
            return $query;
        }

    }

    public function scopeFilterMetodoPago($query, $metodoPago)
    {
        if($metodoPago){
            return $query->whereHas('cashs', function ($q) use ($metodoPago) {
                $q->whereHas('metodoPago', function ($q) use ($metodoPago) {
                    $q->where('nombre', '=', $metodoPago);
                });
            });

        }else{
            return $query;
        }

    }

    public function scopeCajero($query, $user)
    {
        if (strlen($user) > 0) {
            return $query->where('user_id', $user);
        } else {
            return $query;
        }
    }



}
