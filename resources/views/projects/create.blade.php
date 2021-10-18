@extends('layout.app')

@section('content')
    <div class="container">
        <section class="section">
            <p class="title">Create Project</p>
            <hr>
            <form action="#" method="post">
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
            </form>
        </section>
    </div>
@endsection

@include('common.tinymce')
