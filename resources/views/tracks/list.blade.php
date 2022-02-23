@extends('layout.app')

@section('content')
    <div class="container">
        <section class="section">
            <p class="title">Tracks for {{ Str::ucfirst($project->name) }}</p>

            @foreach($tracks as $track)
                <div class="box">
                    <nav class="level">
                        <div class="level-left">
                            <div class="level-item">
                                <a href="{{ route('track.show', [$project, $track]) }}" class="subtitle has-text-link">
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
    </div>
@endsection
