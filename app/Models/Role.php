<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $timestamps = true;


    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
