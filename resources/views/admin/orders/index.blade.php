@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-dark py-4">
            Your Orders
        </h2>

        <div class="table-responsive my-4">
            <table class="table border table-striped table-hover table-light">
                <thead>
                    <tr>
                        <th>Prezzo Ordine</th>
                        <th>Data di Ordinazione</th>
                        <th>Nome Cliente</th>
                        <th>Contatto</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($orders as $order)
                        <tr>
                            <td>
                                {{ $order->total_price }} €
                            </td>
                            <td>
                                {{ $order->created_at }}
                            </td>
                            <td>
                                {{ $order->ui_name }}
                            </td>
                            <td>
                                {{ $order->ui_phone }}
                            </td>
                            {{--  <td>
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-primary">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </td> --}}
                        </tr>
                    @empty
                        <h3 class="py-3">
                            No orders at the moment
                        </h3>
                    @endforelse



                </tbody>
            </table>
        </div>

    </div>
@endsection
