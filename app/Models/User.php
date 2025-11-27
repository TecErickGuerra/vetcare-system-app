<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email', 
        'password',
        'role_id',
        'is_active',
        'is_protected'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
            'is_protected' => 'boolean',
        ];
    }

    public function pets()
    {
        return $this->hasMany(Pet::class, 'owner_id');
    }

    public function isAdmin()
    {
        return $this->role_id === '1';
    }

    public function isStaff()
    {
        return $this->role_id === '2';
    }

    public function isClient()
    {
        return $this->role_id === '3';
    }

    // Método para verificar si el usuario esta activo
    public function canBeDeleted(): bool
    {
        return !$this->is_protected;
    }
}