<div>
    @if (!$is_form)
        @include('livewire.user.education.dt')
    @else
        @if (!$is_update)
            @include('livewire.user.education.create')
        @else
            @include('livewire.user.education.edit')
        @endif
    @endif
</div>
