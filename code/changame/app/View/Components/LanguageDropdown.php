<?php

namespace App\View\Components;

use App\Enums\Language;
use Illuminate\View\Component;

class LanguageDropdown extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.language-dropdown', [
            'languages' => Language::cases(),
            'currentLanguage' => request('language')
        ]);
    }
}
