<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factory extends Model
{
    use HasFactory;
    protected $table = 'factories';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class); // A factory belongs to a single user
    }
    
}
