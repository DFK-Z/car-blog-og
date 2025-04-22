<?php

namespace App\Livewire\Service;

use App\Models\Service;
use Livewire\Component;

class Collection extends Component
{
    public function getServicesProperty()
    {
        return[
            'default' => Service::orderByDesc('created_at')->where('is_active', true)->get(),
        ];
    }
    public function render()
    {
        return view('livewire.service.collection', [
            'services' =>$this->services['default'],
        ]);
    }
}
