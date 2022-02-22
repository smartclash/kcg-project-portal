@extends('layout.app')

@section('content')
    <div class="container">
        <section class="section">
            <div class="box">
                <p class="title">{{ $team->name }}</p>
                <p class="subtitle">Leader: {{ Str::title($team->leader->name)  }}</p>
                @if($project)
                    <p class="subtitle">Mentor: {{ $project->mentor->name }}</p>
                @endif

                <hr />

                <nav class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <a href="#" class="button is-danger is-outlined">Delete Team &longrightarrow;</a>
                        </div>
                    </div>
                    @if(!$project)
                        <div class="level-item">
                            <a href="{{ route('project.list') }}" class="button is-info is-outlined">Select Project &longrightarrow;</a>
                        </div>
                    @else
                        <div class="level-item">
                            <a href="{{ route('project.show', $project) }}" class="button is-info is-outlined">View Project &longrightarrow;</a>
                        </div>
                    @endif
                    <div class="level-right">
                        <div class="level-item">
                            <a href="{{ route('team.members.create', $team) }}" class="button is-primary is-outlined">Add members &longrightarrow;</a>
                        </div>
                    </div>
                </nav>
            </div>
        </section>

        <section class="section">
            <div class="panel">
                <p class="panel-heading">Team Members</p>
                @foreach($team->members as $member)
                    <p class="panel-block">
                        {{ $member->email }} - {{ $member->name }}
                    </p>
                @endforeach
            </div>
        </section>
    </div>
@endsection
