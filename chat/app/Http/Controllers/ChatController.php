<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Chat;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        if($request->session()->missing('user_identifier')){session(['user_identifier'=> Str::random(20)]);}
        if($request->session()->missing('user_name')){ session(['user_name' => 'Guest']); }
        $length =Chat::all()->count();
        
        $display = 5;
        
        $chats = Chat::offset($length-$display)->limit($display)->get();
        return view('chat/index',compact('chats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        session(['user_name' => $request->user_name]);
        
        $chat = new Chat();
        $form = $request->all();
        $chat->fill($form)->save();
        return redirect('/chat');
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
