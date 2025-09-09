<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // 👈 Allows us to use factories for testing/seeding
use Illuminate\Foundation\Auth\User as Authenticatable; // 👈 Base User model from Laravel
use Illuminate\Notifications\Notifiable; // 👈 Enables notifications like email, SMS
use Laravel\Sanctum\HasApiTokens; // 👈 Adds Sanctum support for API tokens

class User extends Authenticatable
{
    // 👇 Traits give the model extra functionality
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     * This means these fields can be filled using User::create([...]).
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',     // User's name
        'email',    // User's email
        'password', // User's password (will be hashed)
    ];

    /**
     * The attributes that should be hidden for serialization.
     * These won’t be shown when returning JSON responses.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',       // Hide password
        'remember_token', // Hide remember token
    ];

    /**
     * The attributes that should be cast.
     * Automatically converts fields to given types.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // Treat email_verified_at as a date
            'password' => 'hashed',            // Automatically hash passwords
        ];
    }
}
