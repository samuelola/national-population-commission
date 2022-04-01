@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Corper Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}
                    Welcome {{Auth::user()->name}}
                   
                    <a style="float: right;" href="{{route('addcitizen')}}" class="btn btn-primary btn-sm">Add Citizen</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
