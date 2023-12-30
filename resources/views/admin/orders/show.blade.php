@extends('layouts.admin')




@section('content')
    <div class="container">
        <h2 class="fs-4 text-dark py-4">
            Your Dishes in Orders
        </h2>

        <div class="table-responsive my-4">
            <table class="table border table-striped table-hover table-light">
                <thead>
                    <tr>
                        <th>Orders ID</th>
                        <th>Dish ID</th>
                        <th>Quantity</th>
                        <th>Dish Name</th>
                        <th>Dish Description</th>
                        <th>Dish Price</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($order as $data)
                        <tr>
                            <td>
                                {{ $data }}
                            </td>
                            <td>
                                @foreach ($data->dishes as $pivot)
                                    <li>
                                        {{ $pivot->pivot->qty }}
                                    </li>
                                @endforeach
                            </td>
                            <td>
                            </td>
                            <td>
                                {{ $data->name }}
                            </td>
                            <td>
                                {{ $data->description }}
                            </td>
                            <td>
                                {{ $data->price }}
                            </td>
                        </tr>
                    @endforeach



                </tbody>
            </table>
        </div>

    </div>
@endsection
