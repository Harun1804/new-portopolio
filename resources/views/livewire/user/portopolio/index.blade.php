<div>
    @if (!$is_form)
        @if (!$is_detail)
            @include('livewire.user.portopolio.data')
        @else
            @include('livewire.user.portopolio.detail')
        @endif
    @else
        @include('livewire.user.portopolio.form')
    @endif
</div>
