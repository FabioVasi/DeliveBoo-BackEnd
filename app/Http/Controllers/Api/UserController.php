<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('dish', 'types')->inRandomOrder()->get();
        return response()->json([
            'success' => true,
            'result' => $users
        ]);
    }

    public function show($slug)
    {

        $user = User::with('dish', 'types')->where('slug', $slug)->first();
        if ($user) {
            return response()->json([
                'success' => true,
                'result' => $user
            ]);
        } else {
            return response()->json([
                'success' => false,
                'result' => 'Ops! Page not found'
            ]);
        }
    }

    public function filterByType(Request $request)
    {


        /*  $types = $request->input('types'); // Assuming 'types' is an array of type values
        $restaurants = User::whereHas('types', function ($query) use ($types) {
            $query->whereIn('slug', $types);
        })->get()->load('types'); */

        $types = $request->input('types');
        $restaurants = User::whereHas('types', function ($query) use ($types) {
            $query->whereIn('slug', $types);
        }, '>=', count($types))->get()->load('types');

        return response()->json($restaurants);
    }
}
