<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $dishes = Dish::where('user_id', Auth::id())->get();

        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request)
    {
        $val_data = $request->validated();

        $val_data['slug'] = Str::slug($request->name, '-');

        if ($request->has('img')) {
            $path = Storage::put('images', $request->img);
            $val_data['img'] = $path;
        }

        $val_data['user_id'] = Auth::id();
        $new_dish = Dish::create($val_data);

        return to_route('admin.dishes.show', $new_dish)->with('message', 'Dish Created!😋');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {

        if ($dish->user_id === Auth::id()) {
            return view('admin.dishes.show', compact('dish'));
        }

        abort(404, 'This dish does not exist');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {

        if ($dish->user_id === Auth::id()) {

            return view('admin.dishes.edit', compact('dish'));
        }

        abort(404, 'This dish does not exist');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {
        $val_data = $request->validated();

        if ($request->has('img')) {

            $path = Storage::put('images', $request->img);
            $val_data['img'] = $path;

            if (!is_Null($dish->img) && Storage::fileExists($dish->img)) {
                Storage::delete($dish->img);
            }
        }

        $val_data['slug'] = Str::slug($request->name, '-');

        $dish->update($val_data);

        if ($request->has('user_id')) {
            $dish->user_id()->sync($val_data['user_id']);
        }

        return to_route('admin.dishes.show', $dish)->with('message', 'Dish updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        if ($dish->user_id === Auth::id()) {
            if ($dish->img) {
                Storage::delete($dish->img);
            }

            $dish->delete();

            return to_route('admin.dishes.index')->with('message', 'Dish deleted successfully 👍');
        }

        abort(403, 'You cannot delete this dish!');
    }

    public function recycle()
    {
        $trashed_dishes = Dish::onlyTrashed()->orderByDesc('id')->get();

        return view('admin.dishes.recycle', compact('trashed_dishes'));
    }

    public function restore($id)
    {

        $dish = Dish::onlyTrashed()->find($id);
        //dd($dish);

        //$dish->restore();

        if ($dish) {
            $dish->restore();
            return redirect()->route('admin.dishes.recycle')->with('status', 'Dish restored successfully ♻️');
        }
    }
}
