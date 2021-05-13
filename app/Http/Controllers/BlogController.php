<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class BlogController extends Controller
{
    public function index(){
        $blogData = Post::paginate(4);
        //Getting category data with count of post means how many post in tht category with relationship
        $category = Category::withCount('posts')->get();
        $latestPost = Post::orderBy('created_at', 'desc')->take(4)->get();
        
        return view('pages.blog',['blogData'=>$blogData,'category'=>$category,'latestPost'=>$latestPost]);
    }
    public function blog_detail($blog_id){
        if(!empty($blog_id) && Post::where('id', $blog_id )->exists()){
            $category = Category::withCount('posts')->get();
            $blogDetail = Post::find($blog_id);
            $latestPost = Post::orderBy('created_at', 'desc')->take(4)->get();
            return view('pages.blog_detail',['blogDetail'=>$blogDetail,'category'=>$category,'latestPost'=>$latestPost]);
        }
    }

    public function storeBlog(Request $request ){
        $request->validate([
            'title' => 'required|min:1',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tag' => 'required',
            'category_id' => 'required',
            'status' => 'required',
            'description' => 'required|min:10',
        ]);
        $storeData = array();      
        $storeData['title'] = $request->title;
        $storeData['tag'] = $request->tag;
        $storeData['category_id'] = $request->category_id;
        $storeData['status'] = $request->status;
        $storeData['description'] = $request->description;
        if ($request->hasFile('image_url')) {
            $imageName = time().'.'.$request->image_url->extension();
            $imageUrl = 'uploads/blog/'.$imageName;
            $storeData['main_image'] = $imageUrl;
            $request->image_url->move(public_path('uploads/blog/'), $imageName);
        }
        $postData = Post::create($storeData);
        if($postData){
            return back()
            ->with('success','You have successfully added blog data.');
        }else{
            return back()
            ->with('error','Something went wrong');
        }
    }
    public function blogList(){
        $postData = Post::orderBy('id', 'DESC')->get();
        return view('components.blog-list',['postData'=>$postData]);
    }
    public function editBlog($blog_id){
        if(!empty($blog_id) && Post::where('id', $blog_id )->exists()){
            $postData = Post::find($blog_id);
            return view('components.edit-blog',['postData'=>$postData]);
        }else{
            return back()
            ->with('error','Something went wrong');
        }   
    }
    public function updateBlog(Request $request, $blog_id){
        if(!empty($blog_id) && Post::where('id', $blog_id )->exists()){
            $request->validate([
                'title' => 'required|min:1',
                'tag' => 'required',
                'category_id' => 'required',
                'status' => 'required',
                'description' => 'required|min:10',
            ]);
            $storeData = array();      
            $storeData['title'] = $request->title;
            $storeData['tag'] = $request->tag;
            $storeData['category_id'] = $request->category_id;
            $storeData['status'] = $request->status;
            $storeData['description'] = $request->description;

            if ($request->hasFile('image_url')) {
                $imageName = time().'.'.$request->image_url->extension();
                $imageUrl = 'uploads/blog/'.$imageName;
                $storeData['main_image'] = $imageUrl;
                $request->image_url->move(public_path('uploads/blog/'), $imageName);
            } 
            $blogPost = Post::where('id',$blog_id)->update($storeData);
            return back()
            ->with('success','You have successfully updated post data.');
        }
        return back()
            ->with('error','Something went wrong.');    
    }
    public function deleteBlog($blog_id){
        if(!empty($blog_id) && Post::where('id', $blog_id )->exists()){
            $blogPost = Post::where('id',$blog_id)->delete();
            return back()
            ->with('success','Blog Post deleted successfully.'); 
        }else{
            return back()
            ->with('error','Something went wrong.'); 
        }
    }
    public function changeStatus($blog_id,$status){
        if(!empty($blog_id) && Post::where('id', $blog_id )->exists()){
            $blogPost = Post::where('id',$blog_id)->update(['status'=>$status]);
            return back()
            ->with('success','Status Updated successfully.'); 
        }else{
            return back()
            ->with('error','Something went wrong.'); 
        }
    }
}
