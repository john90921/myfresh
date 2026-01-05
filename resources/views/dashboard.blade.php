<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Dashboard') }}</h2>
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Welcome Back!</h3>
                    </div>
                    <div class="panel-body">
                        <p>{{ __("You're logged in!") }}</p>
                        <p>Welcome to your dashboard, <strong>{{ Auth::user()->name }}</strong>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
