<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function getRoom($id)
    {
        $result = Rooms::find($id);
        return $result;
    }

    public function list()
    {
        return Rooms::Paginate(12);
        // return Rooms::All();
    }
    public function searchWithLocation($searchValue)
    {
        return Rooms::where('location', "Like", "%$searchValue%")->Paginate(12);
    }
}
