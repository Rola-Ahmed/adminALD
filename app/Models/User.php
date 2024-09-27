<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


 // Many-to-many relation with roles
//  public function roles():BelongsToMany
//  {
//      return $this->belongsToMany(Role::class);
//  }


 public function roles() :BelongsToMany
{
    return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
}

 public function factories()
    {
        return $this->hasMany(Factory::class,'user_id','id'); // A user can have many factories
    }

    // One-to-one relation with Importer
    public function importers()
    {
        return $this->hasMany(Importer::class);
    }
}
