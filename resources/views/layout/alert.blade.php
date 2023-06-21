@if (session('alert'))
    <div class="alert alert-success" role="alert">
        {{ session('alert') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

<script>
    const alert = document.querySelector('.alert');
    const time = setTimeout(function() {
        alert.style.display = 'none'
    }, 2000);
</script>
