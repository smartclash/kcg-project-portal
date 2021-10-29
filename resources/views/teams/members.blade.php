@extends('layout.app')

@section('content')
    <div class="container" x-data="initData()" x-init="queryUsers()">
        <section class="section" x-cloak>
            <div class="panel">
                <p class="panel-heading">
                    Add members to {{ $team->name }}
                </p>
                <div class="panel-block">
                    <div class="control">
                        <input
                            type="text" class="input"
                            name="search" id="search"
                            placeholder="Search User"
                            x-model="query"
                            x-on:input.debounce.300ms="search()"
                            autocomplete="off"
                        >
                    </div>
                </div>
                <div x-show="results.length > 0">
                    <template x-for="user in results">
                        <a class="panel-block" x-on:click.prevent="addUser(user)">
                            <span x-text="user.email"></span>
                        </a>
                    </template>
                </div>
                <div x-show="users.length > 0">
                    <p class="panel-block">
                        Selected Members
                    </p>
                    <div class="panel-block">
                        <div class="field is-grouped is-grouped-multiline">
                            <template x-for="user in users">
                                <div class="control">
                                    <div class="tags has-addons">
                                        <span class="tag is-primary" x-text="user.email"></span>
                                        <a class="tag is-delete" x-on:click.prevent="deleteUser(user)"></a>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                    <div class="panel-block">
                        <button class="button is-primary is-fullwidth is-outlined"
                                x-ref="submitButton"
                                x-on:click="submit($refs.submitButton)"
                        >Submit</button>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('header')
    @parent

    <script>
        const initData = () => ({
            query: null,
            users: [],
            results: [],
            locked: false,
            search: async function () {
                const res = await axios.post("{{ route('user.search') }}", {
                    query: this.query,
                    except: this.users.map(user => user.id)
                });

                this.results = res.data;
            },
            addUser: function (user) {
                this.users.push(user);
                this.results = [];
                this.query = null;
            },
            deleteUser: function (user) {
                this.users = this.users.filter(obj => obj.id != user.id);
            },
            queryUsers: async function () {
                await this.search()
            },
            lockFields: function () {

            },
            unlockFields: function () {

            },
            submit: async function (ref) {
                ref.classList.add('is-loading');
                confirm("submit");
                // TODO: write submit logic
                ref.classList.remove('is-loading');
            },
        });
    </script>
@endsection
