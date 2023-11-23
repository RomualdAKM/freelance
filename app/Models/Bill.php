<?php

namespace App\Models;

use App\Models\User;
use App\Models\BillItems;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'total',
        'totalHT',
        'totalTVA',
        'date_emission',
        'date_echeance',
        'user_id',
       
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function bill_items(){
        return $this->hasMany(BillItems::class);
    }
}
