<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = User::paginate(10);
        return view('admin.users.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //dd($request);
        
       $request->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required',
            // 'imageprofile' => 'required|image|mimes:jpeg,png,jpg|max:2048'
       ]);

    //    $imagename = time().'.'.$request->imageprofile->extension();
    //    $request->imageprofile->move(public_path('uploads'), $imagename);

       
       $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password,
            
       ]);

       return redirect()
                ->route('user.list')
                ->with('success', 'New User created Succesfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => 'required|string|min:8|',
            'role' => 'required',
            //'imageprofile' => 'required|image|mimes:jpeg,png,jpg|max:2048'
       ]);
     
       $user->name = $request->name;
       $user->email = $request->email;
       $user->role = $request->role;

       if(! empty($request->get('password'))){
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()
                ->route('user.index')
                ->with('success', 'Update User Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
        ->route('user.index')
        ->with('success', 'Delete User Succesfully');
    }
}
