<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];
    // protected $fillable = ['name', 'type', 'address', 'price', 'number'];

    public function packages()
    {
        return $this->hasOne(Package::class,'hotel_id','id');
    }
}
