<div>
    @if (!$is_form)
        @include('livewire.user.work-exp.dt')
    @else
        @if (!$is_update)
            @include('livewire.user.work-exp.create')
        @else
            @include('livewire.user.work-exp.edit')
        @endif
    @endif
</div>
