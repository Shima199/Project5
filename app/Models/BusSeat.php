<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class BusSeat extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'bus_seat';
    protected $fillable = [
        'bus_id',
        'A1',
        'A2',
        'A3',
        'A4',
        'B1',
        'B2',
        'B3',
        'B4',

        'C1',
        'C2',
        'C3',
        'C4',

        'D1',
        'D2',
        'D3',
        'D4',

        'E1',
        'E2',
        'E3',
        'E4',

        'F1',
        'F2',
        'F3',
        'F4',

        'G1',
        'G2',
        'G3',
        'G4',

        'H1',
        'H2',
        'H3',
        'H4',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
