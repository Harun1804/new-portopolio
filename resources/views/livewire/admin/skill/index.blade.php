<div>
    @if (!$is_form)
        @include('livewire.admin.skill.dt')
    @else
        @if (!$is_update)
            @include('livewire.admin.skill.create')
        @else
            @include('livewire.admin.skill.edit')
        @endif
    @endif
</div>
