@extends('layout.app')

@section('content')
    <div class="container">
        <section class="section">
            <p class="title">Create Team</p>

            <div class="box">
                <p>Person creating the team will be the team leader</p>

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

@section('header')
    @parent

    <script>
        const initData = () => ({
            results: null,
            query: null,
            users: [],
            search: async function () {
                if (!this.query) {
                    this.results = null;
                    return this.results;
                }

                const res = await axios.post('/api/user/search', {
                    params: { query: this.query }
                });

                this.results = res.data
            },
            addUser: function (user) {
                this.users.push(user);
            },
            deleteUser: function (user) {
                this.users = this.users.filter(obj => obj.email !== user.email);
            }
        });
    </script>
@endsection
