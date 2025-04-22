<?php

namespace App\Livewire\OrderService;

use App\Http\Requests\SubmitOrderServiceRequest;
use App\Models\OrderService;
use Livewire\Component;

class Form extends Component
{

    public $form = [];
    public $serviceId;

    protected $listeners = ['orderForm' => 'setServiceId'];

    public function setServiceId($id)
    {
        $this->serviceId = $id;
    }

    public function submit()
    {
        $request = new SubmitOrderServiceRequest();

        $validated = $this->validate($request->rules());

        OrderService::create([
            ...$validated['form'],
            'service_id'=>$this->serviceId,
        ]);

        $this->reset(['form', 'serviceId']);
    }

    public function render()
    {
        return view('livewire.order-service.form');
    }
}
