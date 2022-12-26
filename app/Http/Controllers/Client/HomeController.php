<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Location;
use App\Models\Product;
use App\Models\Verification;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return Verification::where('phone', 65722393)->get();

//        return Product::selectRaw('COUNT(id) as count, code')
//            ->groupBy('code')
//            ->orderBy('count', 'desc')
//            ->get();
    }
}
