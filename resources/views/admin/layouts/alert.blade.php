@if (session('alert'))
    <div style=" color: green; font-size: 18px; padding: 15px;">
        <i class="fa fa-check" aria-hidden="true"></i> <b>{{ session('alert') }}</b>
    </div>
@endif
