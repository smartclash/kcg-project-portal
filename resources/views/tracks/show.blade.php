@extends('layout.app')

@section('content')
    <div class="container">
        <section class="section">
            <p class="title">{{ $track->name }} Track</p>
            <p class="subtitle">{{ $project->name }} - {{ Str::title($project->mentor->name) }}</p>

            <div class="box">
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

                <hr />

                <div class="content">
                    {!! $track->content !!}
                </div>
            </div>
        </section>

        <section class="section">
            <a href="{{ route('submission.create', [$project, $track]) }}" class="button is-primary is-outlined">Create Submission</a>
        </section>
    </div>
@endsection
