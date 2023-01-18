<?php

namespace App\View\Components;

use App\Models\Promo;
use Illuminate\View\Component;

class GuestLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $promos = Promo::latest()->get();
        return view('components.guest-layout', compact('promos'));
    }
}
