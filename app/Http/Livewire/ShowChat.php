<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowChat extends Component
{
    public $name;
    public $email;

    protected function rules()
    {
        return [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
        ];
    }

    public function submit()
    {
        $this->validate();

        // Lógica para guardar el formulario en la base de datos

        $this->closeModal();
    }

    public function closeModal()
    {
        $this->emit('closeModal');
    }
    public function render()
    {
        return view('livewire.show-chat');
    }
}
