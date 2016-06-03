@if($errors->has())
<div class="ui error message">
    <i class="close icon"></i>

    <div class="header">Error!</div>

    <div class="ui list">
        @foreach($errors->all() as $error)
        <div class="item">{!! $error !!}</div>
        @endforeach
    </div>
</div>
@endif
