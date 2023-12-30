<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return response()->json([
            'success' => true,
            'result' => $types
        ]);
    }

    public function show($slug)
    {
        $type = Type::with('users', 'users.types')->where('slug', $slug)->first();

        if ($type) {
            return response()->json([
                'success' => true,
                'result' => $type
            ]);
        } else {
            return response()->json([
                'success' => false,
                'result' => 'type not found'
            ]);
        }
    }
}
