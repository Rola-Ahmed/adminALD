<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCompanies extends Model
{
    use HasFactory;
    protected $table = 'shipping_companies';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $timestamps = true;
}
