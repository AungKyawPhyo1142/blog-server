<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    // pages
    public function goBlogPage(){
        return view('pages.createBlogPage');
    }

    public function goEditBlogPage(){
        return view('pages.editContent');
    }

    public function goViewBlogPage($id){
        $data = blog::where('id',$id)->first();
        return view('pages.viewContent',compact('data'));
    }

    public function deleteBlog($id){
        blog::where('id',$id)->delete();

        return redirect()->route('mainContent')->with(['deleteSuccess'=>'Your blog has been deleted successfully!']);
    }

    public function createBlog(Request $request){
        $this->validateBlog($request);
        $data = $this->getBlogData($request);

        $file = $request->file('blog_image');
        $fileName = uniqid().'_'.$data['image'];
        $file->move(public_path().'/blogImages', $fileName);
        $data['image'] = $fileName;
        blog::create($data);

        return back()->with(['createSuccess'=>'Blog created successfully!']);

    }

    private function validateBlog(Request $request){
        Validator::make($request->all(),[
            'blog_title' => 'required',
            'blog_content' => 'required',
            'blog_image' => 'required',
            'blog_tags' => 'required'
        ])->validate();
    }

    private function getBlogData(Request $request){
        return [
            'title' => $request->blog_title,
            'content' => $request->blog_content,
            'image' => $request->blog_image->getClientOriginalName(),
            'tags' => implode(',',$request->input('blog_tags', [])),
        ];
    }

}
