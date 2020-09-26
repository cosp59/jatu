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

                    {{ __('You are logged in!') }}
                </div>




<a href="{{url('/page/maendeleo')}}" class="btn btn-success pull-right btn-sm">Mkopo Wa Maendeleo</a>
<br>
<a href="{{ url('page/dharura') }}"  class="btn btn-success pull-right btn-sm">Mkopo wa Dharura</a>

            </div>
        </div>
    </div>
</div>
@endsection
