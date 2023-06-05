<?php

namespace App\Http\Controllers\API;

use App\Models\blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function getAll(){
        $data = blog::get();
        return response()->json([
            'blogs' => $data,
        ], 200);
    }

    public function getDetail(Request $req){
        $data = blog::find($req->id);
        return response()->json([
            'blog' => $data
        ], 200);
    }

    public function getFilter(Request $req){
        $data = blog::where('tags',$req->tag)->get();
        return response()->json([
            'blog' => $data
        ], 200);
    }
}
