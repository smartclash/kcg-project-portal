@extends('layout.app')

@section('content')
    <div class="container">
        <section class="section">
            <p class="title">{{ $team->name }}</p>
            <p class="subtitle">Leader: {{ Str::title($team->leader->name)  }}</p>
        </section>
    </div>
@endsection
