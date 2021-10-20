@extends('layout.app')

@section('content')
    <div class="container">
        <section class="section">
            <p class="title">Create Track</p>
            <p class="subtitle">{{ $project->name }} - {{ Str::title($project->mentor->name) }}</p>

            <div class="box">
                <form action="{{ route('track.create', $project) }}" method="post">
                    @csrf

                    <div class="field">
                        <label for="name" class="label">Title</label>
                        <div class="control">
                            <input type="text" class="input" id="name" name="name" />
                        </div>
                    </div>

                    <div class="field-body pt-4">
                        <div class="field">
                            <label for="due_date" class="label">Due Date</label>
                            <div class="control">
                                <input type="date" class="input" id="due_date" name="due_date" />
                            </div>
                        </div>
                        <div class="field">
                            <label for="due_time" class="label">Due Time</label>
                            <div class="control">
                                <input type="time" class="input" id="due_time" name="due_time" />
                            </div>
                        </div>
                    </div>

                    <div class="field-body pt-4">
                        <div class="field">
                            <label for="lock_date" class="label">Lock Date</label>
                            <div class="control">
                                <input type="date" class="input" id="lock_date" name="lock_date" />
                            </div>
                        </div>
                        <div class="field">
                            <label for="lock_time" class="label">Lock Time</label>
                            <div class="control">
                                <input type="time" class="input" id="lock_time" name="lock_time" />
                            </div>
                        </div>
                    </div>

                    <div class="field pt-4">
                        <label for="content" class="label">Description</label>
                        <div class="control">
                            <textarea name="content" id="content" class="input"></textarea>
                        </div>
                    </div>

                    <div class="field pt-4">
                        <div class="control">
                            <input type="submit" value="Submit" class="button is-primary is-outlined is-fullwidth">
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@include('common.tinymce')
