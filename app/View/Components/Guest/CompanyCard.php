<?php

namespace App\View\Components\guest;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CompanyCard extends Component
{
    /**
     * Create a new component instance.
     */

    public string $companyLogo;

    public function __construct(
        public string $companyId,
        public string $companyName,
        ?string $companyLogo,
    ) {
        $this->companyLogo = $companyLogo ?? "https://placehold.co/600x400";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.guest.company-card');
    }
}
