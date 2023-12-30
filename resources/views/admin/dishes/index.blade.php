@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-dark py-4">
            Your Dishes
        </h2>

        <div class="table-responsive my-4">
            <table class="table border table-striped table-hover table-light">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Available</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($dishes as $dish)
                        <tr>
                            <td>
                                @if (str_contains($dish->img, 'http'))
                                    <img height="150px" width="150px" src="{{ $dish->img }}" alt="{{ $dish->name }}">
                                @else
                                    <img height="150px" width="150px" src="{{ asset('storage/' . $dish->img) }}"
                                        alt="{{ $dish->name }}">
                                @endif
                            </td>
                            <td>
                                {{ $dish->name }}
                            </td>
                            <td>
                                @if ($dish->available)
                                    <span>
                                        ✅
                                    </span>
                                @else
                                    <span>
                                        ❌
                                    </span>
                                @endif
                            </td>
                            <td>
                                {{ $dish->created_at }}
                            </td>
                            <td>
                                <div style="height: 100%"
                                    class="d-flex flex-column align-items-center  gap-2  justify-content-center">

                                    <a href="{{ route('admin.dishes.show', $dish->slug) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.dishes.edit', $dish->slug) }}" class="btn btn-secondary">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>


                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalId-{{ $dish->slug }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
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
                                                <form action="{{ route('admin.dishes.destroy', $dish->slug) }}"
                                                    method="POST">
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



                            </td>
                        </tr>
                    @empty
                        <h3 class="py-3">
                            No dishes at the moment
                        </h3>
                    @endforelse



                </tbody>
            </table>
        </div>

    </div>
@endsection
