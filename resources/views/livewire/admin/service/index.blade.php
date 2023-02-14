<div>
    @if (!$is_form)
        @include('livewire.admin.service.dt')
    @else
        @if (!$is_update)
            @include('livewire.admin.service.create')
        @else
            @include('livewire.admin.service.edit')
        @endif
    @endif
</div>
