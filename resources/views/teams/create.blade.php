@extends('layout.app')

@section('content')
    <div class="container">
        <section class="section">
            <div class="box">
                <p class="title">Join Team</p>
                <p>
                    If you just want to join a team, ask your team leader to create a team and then add you into it.
                    No more action is required from your side.
                </p>
                <div class="divider">
                    or
                </div>
                <p class="title">Create Team</p>
                <p>
                    If you create the team, you'll be the designated leader for it. You can add team members later
                </p>
                <form action="{{ route('team.create') }}" class="pt-4" method="post">
                    @csrf

                    <div class="field">
                        <label for="name" class="label">Team Name</label>
                        <div class="control">
                            <input type="text" class="input" name="name" id="name" />
                        </div>
                    </div>

                    <div class="field">
                        <input type="submit" value="Submit" class="button is-primary is-outlined">
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
