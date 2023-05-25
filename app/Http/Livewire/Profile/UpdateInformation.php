<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class UpdateInformation extends Component implements HasForms
{
    use InteractsWithForms;

    public User $user;
    public $data;

    public function mount(): void
    {
        $this->form->fill([
            'name' => $this->user->name,
            'email' => $this->user->email,
            'phone' => $this->user->phone
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->maxLength(255),
            TextInput::make('email')
                ->maxLength(255)
                ->email()
                ->unique(table: User::class, ignorable: $this->user),
            TextInput::make('phone')
                ->maxLength(255)
        ];
    }

    protected function getFormStatePath(): string
    {
        return 'data';
    }

    public function submit()
    {
        $this->user->fill($this->form->getState());
        $this->user->save();
        Notification::make()
            ->title('Success!')
            ->body('Profile information updated successfully!')
            ->success()
            ->send();
    }

    protected function onValidationError(ValidationException $exception): void
    {
        Notification::make()
            ->title($exception->getMessage())
            ->danger()
            ->send();
    }

    public function render()
    {
        return view('livewire.profile.update-information');
    }
}
