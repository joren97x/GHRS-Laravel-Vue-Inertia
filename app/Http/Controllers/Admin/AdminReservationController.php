<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Listing;
use App\Models\Reservation;
use App\Http\Controllers\Controller;

class AdminReservationController extends Controller
{
    //
    public function index(?string $entry = null) {
        $reservations = Reservation::paginate($entry ? $entry : 5);
        
        foreach($reservations as $rs) {
            $rs->user = User::find($rs->user_id);
            $rs->listing = Listing::find($rs->listing_id);
        }
   
        return Inertia::render('Admin/ManageReservation', ['reservations' => $reservations]);
    }
}
