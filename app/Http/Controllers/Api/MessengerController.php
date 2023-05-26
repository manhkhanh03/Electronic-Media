<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Models\Messenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// $id = Auth::user()->id; hoặc Auth::id() //Lấy về ID người .
// $user = Auth::user() // Lấy về tất cả các thông tin của người dùng.
// $email = Auth::user()->email // Lây về email người dùng.
// ...


class MessengerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Messenger::all();
        return response()->json($data, 200, ['OK']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Messenger::create($request -> all());
        return response()->json($data, 201, ['created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data_sender_id = Messenger::join('users', 'users.id', '=', 'messengers.receiver_id')
            ->join('image_users', 'image_users.user_id', '=', 'messengers.receiver_id')
            ->where('sender_id', $id)
            ->select('messengers.*', 'users.name', 'image_users.url')
            ->orderBy('created_at')
            ->get();

        $data_receiver_id = Messenger::join('users', 'users.id', '=', 'messengers.sender_id')
            ->join('image_users', 'image_users.user_id', '=', 'messengers.sender_id')
            ->where('receiver_id', $id)
            ->select('messengers.*', 'users.name', 'image_users.url')
            ->orderBy('created_at')
            ->get();
        
        $mergedData = $data_sender_id->merge($data_receiver_id)->toArray();
        return response()->json($mergedData, 200, ['OK']);
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
        $data = Messenger::find($id);
        $data->delete();
        return response()->json($data, 200, ['Deleted']);
    }
}
