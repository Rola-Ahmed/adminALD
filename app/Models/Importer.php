<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Importer extends Model
{
    use HasFactory;
    protected $table = 'importers';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $timestamps = true;
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id'); // A factory belongs to a single user
    }
}
