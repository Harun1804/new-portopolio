<div>
    @if (!$is_form)
        @include('livewire.admin.person-job.dt')
    @else
        @include('livewire.admin.person-job.create')
    @endif
</div>
