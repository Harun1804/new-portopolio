<div>
    @if (!$is_form)
        @include('livewire.admin.sosmed.dt')
    @else
        @if (!$is_update)
            @include('livewire.admin.sosmed.create')
        @else
            @include('livewire.admin.sosmed.edit')
        @endif
    @endif
</div>
