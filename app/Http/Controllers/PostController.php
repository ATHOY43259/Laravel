<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view('create');
    }

    public function ourfilestore(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes: jpeg,png',
        ]);
    

        //Upload images
        $imageName=null;
        if(isset($request->image)){
            $imageName = time().'.'. $request->image->extension();
            $request->image->move(public_path('images'),$imageName);

        }

    


        //Add new post

        $post = new Post;
        $post->name = $request->name;
        $post->description = $request->description;
        $post->image = $imageName;
    
        $post->save();
        return redirect()->route('home')->with('Success','Your Post Has Been Created');
    }
    //EditData

    public function editData($id){
        $post = Post::findOrfail($id);
        return view('edit',['ourPost'=>$post]);
    }
    //updateData

    public function updateData($id, Request $request){
        

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes: jpeg,png',
        ]);
    



        //update new

        $post = Post::findOrfail($id);
        $post->name = $request->name;
        $post->description = $request->description;
         //Upload images
        
        if(isset($request->image)){
            $imageName = time().'.'. $request->image->extension();
            $request->image->move(public_path('images'),$imageName);
            $post->image = $imageName;

        }
    
        $post->save();
        return redirect()->route('home')->with('Success','Your Post Has Been Updated');

    }

    //deleteData
    public function deleteData($id){
        $post = Post::findOrfail($id);

        $post->delete();
        return redirect()->route('home')->with('Success','Your Post Has Been Deleted');
    }
}


