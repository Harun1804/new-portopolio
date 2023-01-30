<div>
    @if (!$is_form)
        @include('livewire.user.about.data')
    @else
        @include('livewire.user.about.form')
    @endif
</div>
