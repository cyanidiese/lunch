@extends('templates.auth.layout')

@section('content')
    <section class="auth">
        <div class="ui container">
            <div class="ui segment login-form-segment">

                @include('templates.auth.login._partials.forms.login')
            </div>
        </div>
    </section>
@endsection
