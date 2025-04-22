<?php

namespace App\Livewire\OrderService;

use Livewire\Component;

class Button extends Component
{
    public $serviceId;

    public function getId()
    {
        $this->dispatch('orderForm', $this->serviceId);
    }

    public function render()
    {
        return view('livewire.order-service.button');
    }
}
