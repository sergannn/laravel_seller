<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    protected $fillable = [
        'sum',
        'seller_id',
        'buyer_id',
    ];

    public function seller()
    {
        return $this->belongsTo(Organization::class, 'seller_id');
    }

    public function buyer()
    {
        return $this->belongsTo(Organization::class, 'buyer_id');
    }
}
