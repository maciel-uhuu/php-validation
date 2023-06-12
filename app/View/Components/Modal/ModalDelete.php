<?php

namespace App\View\Components\Modal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalDelete extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $routeDelete, public string $id,
        public array $args = [], public string $title = '', public string $description = "", public string $buttonText = '')
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal.modal-delete');
    }
}
