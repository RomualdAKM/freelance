<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'bill_id',
        'article',
        'quantite',
        'price',
        'numberTVA',
       
       
    ];
}
