<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUser;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id')->paginate(10);
        return view('user.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateUser $request)
    {
        if($request->validated()){
            $img_url = $request->file('img_url')->store('public/'.request('email'));

            User::create([
                'name' => request('name'),
                'email' => request('email'),
                'password' => Hash::make(request('password')),
                'document_type' => request('document_type'),
                'document_number' => request('document_number'),
                'nickname' => request('nickname'),
                'birth_date' => request('birth_date'),
                'img_url' => $img_url,
            ]);
        }

        return redirect()->route('user.index')->with('status','Publicista creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return view('user.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('user.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, User $user)
    {
        //
        if($request->validated()){
            $img_url = $request->file('img_url')->store('public/'.request('email'));

            $user->update([
                'name' => request('name'),
                'email' => request('email'),
                'password' => Hash::make(request('password')),
                'document_type' => request('document_type'),
                'document_number' => request('document_number'),
                'nickname' => request('nickname'),
                'birth_date' => request('birth_date'),
                'img_url' => $img_url,
            ]);
        }

        return redirect()->route('user.index')->with('status','Publicista modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return back()->with('status', 'El publicista se ha eliminado con éxito.');
    }

    public function showPapers(User $user){
        
        $papers = $user->papers;
        return view('user.paper',['papers'=>$papers]);
    }
}
