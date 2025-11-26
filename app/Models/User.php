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
        'status',
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
            'is_protected' => 'boolean',
        ];
    }

    public function pets()
    {
        return $this->hasMany(Pet::class, 'owner_id');
    }

    public function isAdmin()
    {
        return $this->role_id === 'Administrador';
    }

    public function isStaff()
    {
        return $this->role_id === 'Staff';
    }

    public function isClient()
    {
        return $this->role_id === 'Cliente';
    }

    // Método para verificar si el usuario esta activo
    public function canBeDeleted(): bool
    {
        return !$this->is_protected;
    }
}