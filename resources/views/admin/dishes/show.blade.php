@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h2 class="text-dark text-center py-4">
            <strong>
                {{ $dish->name }}
            </strong>
        </h2>

        <div class="container pt-5 border-top border-4 border-dark">

            <div class="row pb-5">

                <div class="col-12 col-md-6">
                    {{-- <img width="100%" class="rounded-4" src="{{ asset('storage/' . $dish->img) }}" alt="{{ $dish->name }}"> --}}
                    @if (str_contains($dish->img, 'http'))
                        <img width="100%" src="{{ $dish->img }}" alt="{{ $dish->name }}">
                    @else
                        <img width="100%" src="{{ asset('storage/' . $dish->img) }}" alt="{{ $dish->name }}">
                    @endif
                </div>

                <div class="col-12 col-md-6 pt-4 fs-3">
                    <p>
                        <strong>
                            Description:
                        </strong>
                        {{ $dish->description }}
                    </p>
                    <p>
                        <strong>
                            Ingredients:
                        </strong>

                        {{ $dish->ingredients }}
                    </p>
                    <p>
                        <strong>
                            Price:
                        </strong>
                        € {{ $dish->price }}
                    </p>
                    <div>
                        <strong>Is Available:</strong>
                        @if ($dish->available)
                            <span>
                                ✅
                            </span>
                        @else
                            <span>
                                ❌
                            </span>
                        @endif
                    </div>

                    <div class="mt-5 gap-2">

                        <div class="row">
                            <div class="col">
                                {{-- EDIT --}}
                                <a class="btn btn-secondary p-3 w-100" href="{{ route('admin.dishes.edit', $dish->slug) }}">
                                    <i class="fa-solid fa-pen-to-square fa-xl"></i>
                                </a>
                            </div>

                            <div class="col">
                                {{-- DELETE --}}
                                <button type="button" class="btn btn-danger p-3 w-100" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $dish->slug }}">
                                    <i class="fa-solid fa-trash fa-xl"></i>
                                </button>
                            </div>
                        </div>




                        <!-- Modal Body -->
                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                        <div class="modal fade" id="modalId-{{ $dish->slug }}" tabindex="-1" role="dialog"
                            aria-labelledby="modalTitle-{{ $dish->slug }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Attention! You cannot go back from this
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>

                                        <!-- Delete form -->
                                        <form action="{{ route('admin.dishes.destroy', $dish->slug) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
