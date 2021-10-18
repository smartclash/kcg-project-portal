@extends('layout.app')

@section('content')
    <div class="container">
        <section class="section">
            <p class="title">{{ config('app.name') }}</p>
            @auth
                <a href="{{ route('home') }}" class="button is-primary is-outlined">Home</a>
            @else
                <a href="{{ route('login') }}" class="button is-primary is-outlined">Login</a>
            @endauth
        </section>
    </div>
@endsection
