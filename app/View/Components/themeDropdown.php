<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class themeDropdown extends Component
{
    /**
     * Create a new component instance.
     */

    public $themes;


    public function __construct()
    {
        $this->themes = [
            'light'       => '🌞',
            'dark'        => '🌙',
            'cupcake'     => '🧁',
            'bumblebee'   => '🐝',
            'emerald'     => '💚',
            'corporate'   => '🏢',
            'synthwave'   => '🌆',
            'retro'       => '📺',
            'cyberpunk'   => '🤖',
            'valentine'   => '❤️',
            'halloween'   => '🎃',
            'garden'      => '🌱',
            'forest'      => '🌲',
            'aqua'        => '💧',
            'lofi'        => '🎶',
            'pastel'      => '🎨',
            'fantasy'     => '🧚',
            'wireframe'   => '📐',
            'black'       => '⬛',
            'luxury'      => '💎',
            'dracula'     => '🧛',
            'cmyk'        => '🖨️',
            'autumn'      => '🍂',
            'business'    => '💼',
            'acid'        => '☣️',
            'lemonade'    => '🍋',
            'night'       => '🌌',
            'coffee'      => '☕',
            'winter'      => '❄️',
            'dim'         => '🌒',
            'nord'        => '🧊',
            'sunset'      => '🌇',
            'caramellatte' => '🍮',
            'abyss'       => '🌊',
            'silk'        => '🪡'
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.theme-dropdown');
    }
}
