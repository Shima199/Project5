@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- Success Display--}}

                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card-header">{{ __('User Dashboard') }}</div>



                <div class="card-body">
                    {{ __('You are logged in as a user!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
