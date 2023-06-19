<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Article;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::join('image_users', 'user_id', '=', 'users.id')
            ->where('users.id', $id)
            ->select('users.*', 'image_users.user_id', 'image_users.url')
            ->get();
        return response()->json($data, 200, ['OK']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = User::find($id);
        $data->update($request->all());
        return response()->json($data, 200, ['OK']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // public function handleManagementUsers(Request $request) {
    //     $users_reader = User::join('roles', 'roles.id', 'users.user_role_id')
    //                 ->leftJoin('articles', 'articles.author_id', 'users.id')
    //                 ->whereRaw('articles.author_id is null')
    //                 ->selectRaw('users.id,  users.user_role_id, users.name, users.address, users.phone, users.email, roles.name as role_name')
    //                 ->groupBy('users.id','users.user_role_id', 'users.name', 'users.address', 'users.phone', 'users.email', 'roles.name', 'articles.author_id')
    //                 ->get();
    //     $users = User::join('roles', 'roles.id', 'users.user_role_id')
    //             ->join('articles', 'articles.author_id', 'users.id')
    //             ->selectRaw('users.id,  users.user_role_id, users.name, users.address, users.phone, users.email, roles.name as role_name')
    //             ->selectRaw('count(articles.author_id) as total_articles')
    //             ->groupBy('users.id','users.user_role_id', 'users.name', 'users.address', 'users.phone', 'users.email', 'roles.name', 'articles.author_id')
    //             ->get();

    //     $users_reader = json_decode($users_reader);
    //     $users = json_decode($users);
    //     foreach($users_reader as $user) {
    //         array_push($users, $user);
    //     }
    //     return response()->json($users, 200, ['OK']);
    // }

    public function handleSearchName(Request $request) {// request -> name -> role_name
        $users_reader = User::join('roles', 'roles.id', 'users.user_role_id')
                    ->leftJoin('articles', 'articles.author_id', 'users.id')
                    ->whereRaw('users.name like  "%'.$request->name .'%"')
                    ->whereRaw('roles.name like  "%'.$request->role_name .'%"')
                    ->whereRaw('articles.author_id is null')
                    ->selectRaw('users.limit_write, users.id,  users.user_role_id, users.name, users.address, users.phone, users.email, roles.name as role_name')
                    ->groupBy('users.id','users.user_role_id', 'users.name', 'users.address', 'users.phone', 'users.email', 'roles.name', 'articles.author_id')
                    ->get();
        $users = User::join('roles', 'roles.id', 'users.user_role_id')
                ->join('articles', 'articles.author_id', 'users.id')
                ->whereRaw('users.name like  "%'.$request->name .'%"')
                ->whereRaw('roles.name like  "%'.$request->role_name .'%"')
                ->selectRaw('users.limit_write, users.id,  users.user_role_id, users.name, users.address, users.phone, users.email, roles.name as role_name')
                ->selectRaw('count(articles.author_id) as total_articles')
                ->groupBy('users.id','users.user_role_id', 'users.name', 'users.address', 'users.phone', 'users.email', 'roles.name', 'articles.author_id')
                ->get();

        $users_reader = json_decode($users_reader);
        $users = json_decode($users);
        foreach($users_reader as $user) {
            array_push($users, $user);
        }
        return response()->json($users, 200, ['OK']);
    }
}
