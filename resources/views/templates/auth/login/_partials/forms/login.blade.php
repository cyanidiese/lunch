@include('templates._partials.messages.error')

<div class="ui form">
    {!! Form::open(['id' => 'login-form', 'route' => ['login.user']]) !!}
        <div class="required field">
            {!! Form::email('email', old('email'), ['id' => 'email', 'autocomplete' => 'off', 'placeholder' => 'Email']) !!}
        </div>
        <div class="required field">
            {!! Form::password('password', ['id' => 'password', 'placeholder' => 'Password']) !!}
        </div>

        <button class="ui button login-button" type="submit">
            Log in
        </button>
    {!! Form::close() !!}
</div>
