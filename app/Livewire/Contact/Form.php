<?php

namespace App\Livewire\Contact;

use App\Http\Requests\Contact\StoreContactRequest;
use App\Models\Contact;
use Livewire\Component;

class Form extends Component
{
    public $form = [];
    public function submit()
    {
        $request = new StoreContactRequest();

        $validated = $this->validate(
            $request->rules(),
            $request->messages(),
        );

        Contact::create($validated);
        $this->reset('form');
    }

    public function render()
    {
        return view('livewire.contact.form');
    }
}
