@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-dark py-4">
            {{ __('Edit Dishes Page for') }} {{ Auth::user()->name }}.
        </h2>

        <div class="row justify-content-center my-3">

            <div class="col">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form action="{{ route('admin.dishes.update', $dish) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('put')

                    {{-- DISH NAME --}}
                    <div class="mb-3">
                        <label for="name" class="form-label"><strong>Name</strong></label>

                        <input type="text" class="form-control" name="name" id="name" aria-describedby="helpName"
                            placeholder="New Dish name" required value="{{ old('name') ? old('name') : $dish->name }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- DISH DESCRIPTION --}}
                    <div class="mb-3">
                        <label for="description" class="form-label"><strong>Description</strong></label>

                        <input type="text" class="form-control" name="description" id="description"
                            aria-describedby="helpDescription" placeholder="New dish description" required
                            value="{{ old('description') ? old('description') : $dish->description }}">
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- DISH INGREDIENTS --}}
                    <div class="mb-3">
                        <label for="ingredients" class="form-label"><strong>Ingredients</strong></label>

                        <input type="text" class="form-control" name="ingredients" id="ingredients"
                            aria-describedby="helpIngredients" placeholder="Put the ingredients" required
                            value="{{ old('ingredients') ? old('ingredients') : $dish->ingredients }}">
                        @error('ingredients')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <div class="row">

                            {{-- price --}}
                            <div class="col">
                                <label for="price" class="form-label"><strong>Price</strong></label>
                                <input type="number" class="form-control" name="price" id="price"
                                    aria-describedby="helpPrice" step="0.01" min="0" max="9999.99" required
                                    value="{{ old('price', $dish->price) }}">
                                @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- is available --}}
                            <div class="col">
                                <label for="available" class="form-label"><strong>Availability</strong></label><br>
                                <div class="d-flex gap-3">
                                    <div>
                                        <input type="radio" id="isAvailable" name="available" value="1"
                                            {{ $dish->available != old('available') ? 'checked' : '' }}>
                                        <label for="isAvailable">Is Available</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="notAvailable" name="available" value="0"
                                            {{ $dish->available == old('available') ? 'checked' : '' }}>
                                        <label for="notAvailable">Not Available</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- DISH IMG --}}
                    <div class="mt-5 d-flex">

                        <div class="row">

                            {{-- col with image select --}}
                            <div id="image_select_wrapper" class="me-5 col-12 col-lg-12">
                                <label for="img" class="form-label"><strong>Choose an image file for your
                                        dish</strong></label>
                                <input type="file" class="form-control" name="img" id="img"
                                    placeholder="Upload a new image file..." aria-describedby="fileHelpImg">
                            </div>

                            @error('img')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    {{-- submit button --}}
                    <button type="submit" class="btn btn-success my-3">SAVE</button>
                    <a class="btn btn-primary" href="{{ route('admin.dishes.index') }}">CANCEL</a>

                </form>
            </div>
        </div>

    </div>
@endsection
