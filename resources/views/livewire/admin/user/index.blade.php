<div>
    @if (!$is_form)
        @include('livewire.admin.user.dt')
    @else
        @if (!$is_update)
            @include('livewire.admin.user.create')
        @else
            @include('livewire.admin.user.edit')
        @endif
    @endif
</div>
