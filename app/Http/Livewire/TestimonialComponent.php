<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TestimonialComponent extends Component
{
    public function render()
    {
        return view('livewire.testimonial-component')->layout('layouts.master');
    }
}
