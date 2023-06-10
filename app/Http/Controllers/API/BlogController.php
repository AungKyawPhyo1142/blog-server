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
        logger($data);
        return response()->json([
            'blog' => $data
        ], 200);
    }

    public function getTopRated(){
        $data = blog::where('rating','>=',4)->orderBy('rating')->limit(3)->get();
        return response()->json([
            'blogs' => $data
        ], 200);
    }

    public function getRecent(){
        $data = blog::orderBy('created_at')->limit(3)->get();
        return response()->json([
            'blogs' => $data
        ], 200);
    }

    public function searchBlog(Request $req){

        $data = blog::where('title','LIKE','%'.$req->searchKey.'%')
                      ->orWhere('tags', 'LIKE', '%'.$req->searchKey.'%')->get();
        return response()->json([
            'blogs' => $data
        ], 200);
    }

}
