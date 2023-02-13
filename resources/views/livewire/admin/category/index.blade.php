<div>
    @if (!$is_form)
        @include('livewire.admin.category.dt')
    @else
        @if (!$is_update)
            @include('livewire.admin.category.create')
        @else
            @include('livewire.admin.category.edit')
        @endif
    @endif
</div>
