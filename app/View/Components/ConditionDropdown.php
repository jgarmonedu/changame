<?php

namespace App\View\Components;

use App\Enums\Condition;
use Illuminate\View\Component;

class ConditionDropdown extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.condition-dropdown', [
            'conditions' => Condition::cases(),
            'currentCondition' => request('condition')
        ]);
    }
}
