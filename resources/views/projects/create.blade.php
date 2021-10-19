@extends('layout.app')

@section('content')
    <div class="container">
        <section class="section">
            <p class="title">Create Project</p>
            <hr>
            <form action="{{ route('project.create') }}" method="post">
                @csrf

                <div class="field">
                    <label for="name" class="label">Project Title</label>
                    <div class="control">
                        <input type="text" name="name" id="name" class="input" />
                    </div>
                </div>

                <div class="field">
                    <label for="content" class="label">Project Title</label>
                    <div class="control">
                        <textarea name="content" id="content" class="input"></textarea>
                    </div>
                </div>

                <div class="field">
                    <label for="verticals" class="label">Verticals</label>
                    <div class="control">
                        <div class="select is-multiple">
                            <select name="verticals[]" id="verticals" multiple>
                                @foreach($verticals as $vertical)
                                    <option value="{{ $vertical->id }}">{{ $vertical->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <input type="submit" value="Submit" class="button is-primary is-outlined is-fullwidth">
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection

@include('common.tinymce')
