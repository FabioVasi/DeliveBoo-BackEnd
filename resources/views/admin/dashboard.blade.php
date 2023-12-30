@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-dark py-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row row-cols-1 row-cols-md-2 justify-content-center">
            <div class="col mb-3 mb-md-0 ">
                <div class="card h-100">
                    <div class="card-header">{{ __('User Dashboard') }}</div>

                    <div class="card-body text-center ">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <strong>
                            {{ __('You are logged in!') }}
                        </strong>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100">
                    <div class="card-header">{{ __('Ordini Totali:') }}</div>

                    <div class="card-body text-center">


                        <strong>

                            {{ $order }}
                        </strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
