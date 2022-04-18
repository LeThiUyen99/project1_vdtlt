<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Category;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(5);

        return view('blogs.index',compact('blogs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users= Account::all();
        $categories = Category::all();
        return view('blogs.create', [
            'users' => $users,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'blogName' => 'required',
            'userId' => 'required',
            'categoryId' => 'required',
            'blogPicture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

//        $input = $request->all();
        $input = [
            'blogName' =>$request->blogName,
            'blogInf' =>$request->blogInf,
            'blogPicture' =>$request->blogPicture,
            'blogContent' =>$request->blogContent,
            'userId' => $request->userId,
            'categoryId' => $request->categoryId
        ];

        if ($blogPicture = $request->file('blogPicture')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $blogPicture->getClientOriginalExtension();
            $blogPicture->move($destinationPath, $profileImage);
            $input['blogPicture'] = "$profileImage";
        }

        Blog::create($input);

        return redirect()->route('blogs.index')
            ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('blogs.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $users= Account::all();
        $categories = Category::all();
        return view('blogs.edit',[
            'users' => $users,
            'categories' => $categories
        ],compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
//        dd($request->all());
        $request->validate([
            'blogName' => 'required',
            'userId' => 'required',
            'categoryId' => 'required'
        ]);

        $input = $request->all();

        if ($blogPicture = $request->file('blogPicture')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $blogPicture->getClientOriginalExtension();
            $blogPicture->move($destinationPath, $profileImage);
            $input['blogPicture'] = "$profileImage";
        }else{
            unset($input['blogPicture']);
        }

        $blog->update($input);

        return redirect()->route('blogs.index')
            ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blogs.index')
            ->with('success','Product deleted successfully');
    }
}
