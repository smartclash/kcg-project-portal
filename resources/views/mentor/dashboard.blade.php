@extends('layout.app')

@section('content')
    <div class="container">
        <section class="section">
            <p class="title">{{ Auth::user()->type->description }} Dashboard</p>
            <div class="field is-grouped">
                <div class="control">
                    <a href="{{ route('project.create') }}" class="button is-primary">Create Project</a>
                </div>
                <div class="control">
                    <a href="{{ route('project.list') }}" class="button is-secondary">Show Projects</a>
                </div>
            </div>
        </section>
    </div>
@endsection
