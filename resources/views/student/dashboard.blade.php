@extends('layout.app')

@section('content')
    <div class="container">
        <section class="section">
            <p class="title">{{ Auth::user()->type->description }} Dashboard</p>
        </section>
    </div>
@endsection
