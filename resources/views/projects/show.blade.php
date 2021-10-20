@extends('layout.app')

@section('content')
    <div class="container">
        <section class="section">
            <p class="title">{{ $project->name }}</p>

            <div class="box">
                <div class="content">
                    {!! $project->content !!}
                </div>

                <hr />

                <div class="tags">
                    @foreach($project->verticals as $vertical)
                        <span class="tag">{{ $vertical->name }}</span>
                    @endforeach
                </div>
            </div>
        </section>

        @if($tracks)
            <section class="section">
                <p class="title">Tracks</p>

                @foreach($tracks as $track)
                    <div class="box">
                        <nav class="level">
                            <div class="level-left">
                                <div class="level-item">
                                    <a href="#" class="subtitle has-text-link">
                                        {{ $track->name }} &longrightarrow;
                                    </a>
                                </div>
                            </div>
                        </nav>

                        <hr />

                        <div class="field is-grouped is-grouped-multiline">
                            <div class="control">
                                <div class="tags has-addons">
                                    <span class="tag is-dark">Due Date</span>
                                    <span class="tag is-info">{{ $track->due_date->toDayDateTimeString() }}</span>
                                </div>
                            </div>

                            <div class="control">
                                <div class="tags has-addons">
                                    <span class="tag is-dark">Lock Date</span>
                                    <span class="tag is-warning">{{ $track->lock_date->toDayDateTimeString() }}</span>
                                </div>
                            </div>

                            @if($track->locked)
                                <div class="control">
                                    <div class="tag is-danger">LOCKED</div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </section>
        @endif

        <section class="section">
            <div class="buttons">
                <a href="{{ route('track.create', $project) }}" class="button is-outlined is-primary">Create Track</a>
                <a href="{{ route('track.list', $project) }}" class="button is-outlined is-info">List Tracks</a>
            </div>
        </section>
    </div>
@endsection
