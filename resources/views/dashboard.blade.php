@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Welome Admin, this is your personal account information!') }} <br>

                        @if ($user_roles->contains('administrator'))
                            You are logged in as Administrator
                        @endif

                        <hr>
                        Here your permit list (Number of Permissions: {{ $user_permissions_count }})
                        @if ($user_permissions)
                            <ol>
                                @foreach ($user_permissions as $permission)
                                    <li>
                                        {{ $permission }} -

                                        @if ($permission == 'manage permit')
                                            @can('manage permit')
                                                <a href="">Manage Permission User</a> <br>
                                            @endcan
                                        @endif
                                    </li>
                                @endforeach
                            </ol>
                        @else
                            <br>
                            *You don't have any permissions <br><br>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
