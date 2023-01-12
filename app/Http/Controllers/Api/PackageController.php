<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Package;
use App\User;

class PackageController extends Controller
{
    public function index(){
        $packages = Package::all();

        $packages = Package::orderBy('created_at' , 'desc')->get();

        $povery = Package::where('price', '<' , 300)->get();
     
        $users = User::all();

        $data = [
            'success' => true,
            'packages' => $packages,
            'users' => $users,
            'povery' => $povery
        ];

        return response()->json($data);
    }
}
