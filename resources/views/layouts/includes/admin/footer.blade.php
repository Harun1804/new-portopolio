<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
@livewireScripts
<script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>>
<script>
    window.addEventListener('swal:modal', event => {
        swal.fire({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
        });
    });

    window.addEventListener('swal:confirm', event => {
        swal.fire({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
        })
        .then((willDelete) => {
            if (willDelete.isConfirmed) {
                window.livewire.emit('destroy');
            }
        });
    });

    window.addEventListener('swal:slider', event => {
        swal.fire({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
        })
        .then((willDelete) => {
            if (willDelete.isConfirmed) {
                window.livewire.emit('deleteSlideshow');
            }
        });
    });
</script>
