<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestHouse extends Model
{
    use HasFactory;
    protected $fillable = [
        'owner_id',
        'room_name', 
        'room_details', 
        'room_location', 
        'room_price', 
        'room_image',
        'latitude',
        'longitude'
    ];

    public function scopeFilter($query, array $filters) {

        if($filters['search'] ?? false) {
            $query->where('room_name', 'LIKE', '%'. request('search') .'%')
            ->orWhere('room_details', 'LIKE', '%'. request('search') .'%')
            ->orWhere('room_location', 'LIKE', '%'. request('search') .'%')
            ->orWhere('room_price', 'LIKE', '%'. request('search') .'%');
        }

    }
}
