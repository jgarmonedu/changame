<?php

namespace App\View\Components;

use App\Enums\Difficulty;
use Illuminate\View\Component;

class DifficultyDropdown extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.difficulty-dropdown', [
            'difficulties' => Difficulty::cases(),
            'currentDifficulty' => request('difficulty')
        ]);
    }
}
