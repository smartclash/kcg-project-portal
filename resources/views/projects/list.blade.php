@extends('layout.app')

@section('content')
    <div class="container">
        <section class="section">
            <p class="title">Project List</p>

            <hr />

            @foreach($projects as $project)
                <div class="box">
                    <nav class="level">
                        <div class="level-left">
                            <div class="level-item">
                                <a href="{{ route('project.show', $project) }}" class="subtitle has-text-link">
                                    {{ $project->name }} &longrightarrow;
                                </a>
                            </div>
                        </div>
                    </nav>

                    <hr />

                    <div class="tags">
                        @foreach($project->verticals as $vertical)
                            <span class="tag">{{ $vertical->name }}</span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </section>
    </div>
@endsection
