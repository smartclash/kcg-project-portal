@extends('layout.app')

@section('content')
    <div class="container">
        <section class="section">
            <p class="title">{{ Auth::user()->type->description }} Dashboard</p>
            <div class="box">
                <nav class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <p class="subtitle">Team: {{ $team->name }}</p>
                        </div>
                    </div>
                    <div class="level-right">
                        <div class="level-item">
                            <a href="{{ route('team.show', $team) }}" class="button is-primary is-outlined">View &longrightarrow;</a>
                        </div>
                    </div>
                </nav>
            </div>
        </section>
    </div>
@endsection
