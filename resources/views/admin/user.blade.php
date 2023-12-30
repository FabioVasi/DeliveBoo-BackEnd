@extends('layouts.admin')

@section('content')
    <div class="container py-2">

        <div class="row mt-5 justify-content-center ">
            <div class="col-6">
                <h1 class=" text-center ">
                    {{ $user[0]->name }}
                </h1>
                <img class="img-fluid card" src="{{ asset('storage/' . $user[0]->img) }}" alt="">

                <h4>{{ $user[0]->email }}</h4>
                <h4>Partita Iva: <strong>{{ $user[0]->p_iva }}</strong></h4>
                <h4>Indirizzo: <strong>{{ $user[0]->address }}</strong></h4>

            </div>
        </div>


    </div>
@endsection
