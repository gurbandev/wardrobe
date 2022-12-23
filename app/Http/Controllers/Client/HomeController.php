<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return Category::whereNotNull('parent_id')
            ->with('parent:id,parent_id,name_tm,name_en')
            ->get(['id', 'parent_id', 'name_tm', 'name_en'])
            ->transform(function ($obj) {
                return [
                    'id' => $obj->id,
                    'name_tm' => $obj->name_tm,
                    'name_en' => $obj->name_en,
                    'parent_id' => $obj->parent_id,
                    'parent_name_tm' => $obj->parent->name_tm,
                    'parent_name_en' => $obj->parent->name_en,
                ];
            });
    }
}
