@if( Session::has('messages'))
<div class="alert {{ Session::get('color') }}" >
    <strong> {{ Session::get('messages') }}</strong>
</div>
@endif