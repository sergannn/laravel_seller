<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
    ];

    public function operations()
    {
        return $this->hasMany(Operation::class);
    }

    public function getOperationsAttribute($value)
    {
        return $this->operations;
    }
}
