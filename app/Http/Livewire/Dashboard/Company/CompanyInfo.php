<?php

namespace App\Http\Livewire\Dashboard\Company;

use App\Models\Company;
use App\View\Components\Layouts\Dashboard;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CompanyInfo extends Component implements HasForms
{

    use InteractsWithForms;

    public $company;
    public $data;

    public function mount(): void
    {
        $this->company = Auth::user()->company;
        $this->form->fill([
            'name' => $this->company->company_name,
            'about' => $this->company->about,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->label('Company Name')
                ->required()
                ->unique(column: 'company_name', ignorable: $this->company),
            Textarea::make('about')
                ->label('About Us'),
            SpatieMediaLibraryFileUpload::make('picture')
                ->label('Company Logo')
                ->image()
                ->imageResizeMode('cover')
                ->imageCropAspectRatio('3:2')
                ->imageResizeTargetWidth('600')
                ->imageResizeTargetHeight('400')
                ->preserveFilenames()
                ->collection('company_logos'),
        ];
    }

    protected function getFormStatePath(): string
    {
        return 'data';
    }

    protected function getFormModel(): Company
    {
        return $this->company;
    }

    public function update()
    {
        $this->form->getState();
        $this->company->update($this->data);
        Notification::make()
            ->title('Information saved successfully!')
            ->success()
            ->send();
    }
    public function render()
    {
        return view('livewire.dashboard.company.company-info')
            ->layout(Dashboard::class, ['title' => 'Company Information']);
    }
}
