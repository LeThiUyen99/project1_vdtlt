<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::latest()->paginate(5);

        return view('admins.index',compact('admins'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'adminName' => 'required',
            'adminPass' => 'required',
            'adminEmail' => 'required',
        ]);

        $input = $request->all();

        if ($adminImage = $request->file('adminImage')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $adminImage->getClientOriginalExtension();
            $adminImage->move($destinationPath, $profileImage);
            $input['adminImage'] = "$profileImage";
        }

        Admin::create($input);

        return redirect()->route('admins.index')
            ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        return view('admins.show',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('admins.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'adminName' => 'required',
            'adminPass' => 'required',
            'adminEmail' => 'required'
        ]);

        $input = $request->all();

        if ($adminImage = $request->file('adminImage')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $adminImage->getClientOriginalExtension();
            $adminImage->move($destinationPath, $profileImage);
            $input['adminImage'] = "$profileImage";
        }else{
            unset($input['adminImage']);
        }

        $admin->update($input);

        return redirect()->route('admins.index')
            ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return redirect()->route('admins.index')
            ->with('success','Product deleted successfully');
    }
}
