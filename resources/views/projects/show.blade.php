@extends('layout.app')

@section('content')
    <div class="container">
        <section class="section">
            <p class="title">{{ $project->name }}</p>

            <div class="box">
                <div class="content">
                    {!! $project->content !!}
                </div>
            </div>
        </section>
        <section class="section">
            <div class="buttons">
                <a href="{{ route('track.create', $project) }}" class="button is-outlined is-primary">Create Track</a>
                <a href="{{ route('track.list', $project) }}" class="button is-outlined is-info">List Tracks</a>
            </div>
        </section>
    </div>
@endsection
