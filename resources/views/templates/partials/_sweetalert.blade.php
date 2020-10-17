@if(session('berhasil'))
<script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: '{{ session("berhasil") }}',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif