24. Pembuatan Komponen Modal Response pada Blade

{{-- ===== MODAL ===== --}}
@if(session('thankyou'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var el = document.getElementById('thankYouModal');
        if (el) {
            var m = new bootstrap.Modal(el);
            m.show();
        }
    });
</script>
@endif
</body>
</html>