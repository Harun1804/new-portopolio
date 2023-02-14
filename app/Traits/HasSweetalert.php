<?php

namespace App\Traits;

trait HasSweetalert
{
    public function alert($type = 'success', $message = 'success', $text = null)
    {
        $this->dispatchBrowserEvent('swal:modal',
            [
                'type'      => $type,
                'message'   => $message,
                'text'      => $text
            ]);
    }

    public function alertConfirm()
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'message' => 'Apakah kamu yakin?',
            'text' => 'Jika terhapus, data tidak dapat dikembalikan'
        ]);
    }

    public function alertConfirmSlider()
    {
        $this->dispatchBrowserEvent('swal:slider', [
            'type' => 'warning',
            'message' => 'Apakah kamu yakin?',
            'text' => 'Jika terhapus, data tidak dapat dikembalikan'
        ]);
    }
}
