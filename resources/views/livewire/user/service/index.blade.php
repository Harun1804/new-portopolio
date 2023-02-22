<div>
    @if (!$is_form)
        @include('livewire.user.service.data')
    @else
        @include('livewire.user.service.form')
    @endif
</div>
