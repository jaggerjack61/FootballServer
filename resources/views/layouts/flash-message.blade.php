<div class="row">
    @if ($message = Session::get('success'))
        <div class="success col s12 m12">

            <strong>{{ $message }}</strong>
        </div>
    @endif




    @if ($message = Session::get('error'))
        <div class="error col s12 m12">

            <strong>{{ $message }}</strong>
        </div>
    @endif
</div>
