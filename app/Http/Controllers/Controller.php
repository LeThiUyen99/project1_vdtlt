<?php

namespace App\Http\Controllers;
use App\Models\LoginAccount;
use App\Models\LoginAdmin;
use App\Models\Category;
use App\Models\Account;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class Controller extends BaseController
{
//    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function layer()
    {
//        $blogs = DB::table('blogs')
//            ->join('accounts', 'blogs.userId', '=', 'accounts.id')
//            ->join('categories', 'blogs.categoryId', '=', 'categories.id')
//            ->get();
        $blogs = Blog::with(['account', 'category'])->get();
//        dd($blogs);
        return view('layer/layer', compact('blogs'));
    }

    public function login()
    {
        return view('layer/login');
    }
    public function loginPross(Request $request)
    {
//        dd($request->all());
        $accounts = new LoginAccount();
        $accounts->userEmail = $request->input('userEmail');
        $accounts->userPass = $request->input('userPass');
        $accounts = $accounts->get_one();

        if (count($accounts)==1) {
            Session::put('id', $accounts[0]->id);
            Session::put('userName', $accounts[0]->userName);

            return redirect()->route('layer.layer');
        }

        return redirect()->route('layer.login');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('layer.layer');
    }

    public function loginAdmin()
    {
        return view('layer/loginAdmin');
    }

    public function loginAdminPross( Request $request)
    {
        $admins = new LoginAdmin();
        $admins->adminEmail = $request->input('adminEmail');
        $admins->adminPass = $request->input('adminPass');
        $admins = $admins->get_one();

        if (count($admins)==1) {
            Session::put('id', $admins[0]->id);
            Session::put('adminName', $admins[0]->adminName);

            return redirect()->route('admins.index');
        }

        return redirect()->route('layer.loginAdmin');
    }

    public function logoutAdmin()
    {
        Session::flush();
        return redirect()->route('layer.loginAdmin');
    }

    public function detail($id)
    {
        return view('layer.detail', ['detail' => Blog::findOrFail($id)]);
    }

    public function post()
    {
//        $user = Account::all();
        $userId = Session::get('id');
        $userName = Session::get('userName');
        $categories = Category::all();

        return view('layer.post', [
//            'user' => $user,
            'userId' => $userId,
            'userName' => $userName,
            'categories' => $categories
        ]);
    }

    public function savepost(Request $request)
    {
//        dd($request->all());
        $data = [
            'blogName' => $request->blogName,
            'blogInf' => $request->blogInf,
            'blogPicture' => $request->blogPicture,
            'blogContent' => $request->blogContent,
            'userId' => $request->userId,
            'categoryId' => $request->categoryId
        ];
//        dd($data);
        if ($blogPicture = $request->file('blogPicture')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $blogPicture->getClientOriginalExtension();
            $blogPicture->move($destinationPath, $profileImage);
            $data['blogPicture'] = "$profileImage";
        }

        Blog::create($data);
        return redirect()->route('layer.layer');

//        dd($data);
    }

    public function search(Request $request)
    {
        $website = Blog::query()->firstOrFail();
        $key = trim($request->get('q'));
        $blogs = Blog::query()->with([
            "category" => function($query) use ($key){
                return $query->orWhere("categoryName", "like", "%$key%");
            },
            "account" => function($query) use ($key){
                return $query->orWhere("userName", "like", "%$key%");
            }
        ])->orWhere("blogName", "like", "%$key%")->get();
        $categories = Category::all();
        $users = Account::all();
//        dd($website);
        return view('search', [
            'website' => $website,
            'key' => $key,
            'blogs' => $blogs,
            'categories' => $categories,
            'users' => $users,
        ]);
    }

    public function cate() {
        $categories = Category::all();
        return view('layer/cate',compact('categories'));
    }

    public function blogcate() {
        $blogcates = Blog::with(['account', 'category'])->where('categoryId')->get();
//        dd($blogs);
        return view('layer/layer', compact('blogcates'));
    }

    public function signup()
    {
        return view('layer.signup');
    }

    public function signupPross(Request $request)
    {
        $request->validate([
            'userName' => 'required',
            'userPass' => 'required',
            'userEmail' => 'required',
        ]);

        $input = $request->all();

        if ($userImage = $request->file('userImage')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $userImage->getClientOriginalExtension();
            $userImage->move($destinationPath, $profileImage);
            $input['userImage'] = "$profileImage";
        }

        Account::create($input);

        return redirect()->route('layer.layer')
            ->with('success','Account created successfully.');
    }
}
