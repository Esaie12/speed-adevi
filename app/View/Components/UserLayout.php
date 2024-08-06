<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Dons;

class UserLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $dons = Dons::whereNull('deleted_at')->where('started','<=',now())->where('finished','>=',now())
        ->orderBy('finished')->count();

        return view('layouts.user',compact('dons'));
    }
}
