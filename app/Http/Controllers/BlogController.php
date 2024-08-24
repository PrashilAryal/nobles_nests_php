<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();

        return view('pages.blogs', compact('blogs'));
    }

    public function blog_details($id)
    {
        // dd($id);
        $blog = Blog::find($id);
        return view('pages.blogDetails', compact('blog'));
    }
    public function blog_upload()
    {
        $data = User::find(Auth::user()->id);

        return view('admin.blogUpload', compact('data'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'author' => 'required',
            'date' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // $imageName = time() . '.' . $request->image->extension();
        // $request->image->move(public_path('/uploads'), $imageName);
        // Blog::create([
        //     'title' => $request->title,
        //     'details' => $request->details,
        //     'author' => $request->author,
        //     'date' => $request->date,
        //     'image' => $imageName,
        // ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = date('dmY') . time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path("/uploads"), $fileName);
            $response["image"] = $fileName;
            Blog::create([
                'title' => $request->title,
                'details' => $request->details,
                'author' => $request->author,
                'date' => $request->date,
                'image' => $fileName,
            ]);
        }
        return redirect()->back()->with('success', 'Blog Post Successfully Added');
    }
}
