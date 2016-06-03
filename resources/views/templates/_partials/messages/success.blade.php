@if(Session::has('message'))
<div class="ui positive message">
    <i class="close icon"></i>

    <div class="header">Success!</div>

    <p>{!! Session::get('message') !!}</p>
</div>
@endif
