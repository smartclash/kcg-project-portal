@extends('layout.app')

@section('content')
    <div class="container">
        <section class="section">
            <p class="title">{{ $project->name }}</p>

            <div class="card">
                <div class="card-content">
                    {!! $project->content !!}

                    <hr />

                    <div class="tags">
                        @foreach($project->verticals as $vertical)
                            <span class="tag">{{ $vertical->name }}</span>
                        @endforeach
                    </div>
                </div>
                @can('select', $project)
                    <form action="{{ route('project.select', $project) }}" method="post" id="project-select">
                        @csrf
                    </form>
                    <div class="card-footer">
                        <div class="card-footer-item">
                            <button
                                class="button is-primary is-fullwidth is-outlined"
                                onclick="document.getElementById('project-select').submit()">Select Project</button>
                        </div>
                    </div>
                @endcan
            </div>
        </section>

        @can('viewAny', [\App\Models\Track::class, $project])
            <section class="section">
                <div class="box">
                    <div class="level">
                        <div class="level-left">
                            <div class="level-item">
                                <p class="title">Tracks</p>
                            </div>
                        </div>
                        <div class="level-right">
                            @can('create', [\App\Models\Track::class, $project])
                                <div class="level-item">
                                    <a
                                        href="{{ route('track.create', $project) }}"
                                        class="button is-link is-outlined">Create</a>
                                </div>
                            @endcan
                            <div class="level-item">
                                <a
                                    href="{{ route('track.list', $project) }}"
                                    class="button is-primary is-outlined">List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endcan
    </div>
@endsection
