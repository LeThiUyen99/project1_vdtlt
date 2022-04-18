<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Account;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function list()
    {
        $blogs = DB::table('blogs')
            ->join('accounts', 'blogs.userId', '=', 'accounts.id')
            ->join('categories', 'blogs.categoryId', '=', 'categories.id')
            ->get();
        return view('Blog/list', compact('blogs'));
    }

    public function create()
    {
        $accounts = Account::all();
        $categories = Category::all();

        return view('Blog/create', [
            'accounts'=>$accounts,
            'categories'=>$categories
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());
        $data = $request->all();
        if ($blogPicture = $request->file('blogPicture')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $blogPicture->getClientOriginalExtension();
            $blogPicture->move($destinationPath, $profileImage);
            $data['blogPicture'] = "$profileImage";
        }
        Blog::create($data);
        return redirect()->route('Blog.list')->with('message', 'add blog susseccly');
    }
}
