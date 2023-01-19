<div>
    @if (!$is_form)
        @include('livewire.admin.job.dt')
    @else
        @if (!$is_update)
            @include('livewire.admin.job.create')
        @else
            @include('livewire.admin.job.edit')
        @endif
    @endif
</div>
