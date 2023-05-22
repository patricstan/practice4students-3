<?php

namespace App\Http\Livewire\Guest;

use App\Models\Company;
use App\View\Components\Layouts\Guest;
use Livewire\Component;
use Livewire\WithPagination;

class CompanyList extends Component
{

    use WithPagination;

    public int $perPage;
    public string $title;
    public bool $showMore;
    public bool $companiesExist;
    public int $companiesNum;

    public function mount(bool $showMore = false): void
    {
        $this->perPage = 6;
        $this->title = "Partenered Companies";
        $this->showMore = $showMore;
        $this->companiesNum = Company::count();
        $this->companiesExist = Company::exists();
    }

    public function render()
    {
        return view('livewire.guest.company-list', ['companies' => Company::paginate($this->perPage)])
            ->layout(Guest::class, ['title' => $this->title]);
    }
}
