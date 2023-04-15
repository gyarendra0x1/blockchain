<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'manufacture_date', 'expiry_date','brand','description','size','amount'];

    protected $hidden = ['hash'];

    public function setHashAttribute()
    {
        $this->attributes['hash'] = Hash::make($this->name . $this->manufacture_date . $this->expiry_date);
    }
}
