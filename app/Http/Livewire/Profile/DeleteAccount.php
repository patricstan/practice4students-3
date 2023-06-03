<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use LivewireUI\Modal\ModalComponent;

class DeleteAccount extends ModalComponent implements HasForms
{
    use InteractsWithForms;

    public User $user;
    public $password;

    public function mount()
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('password')
                ->password()
                ->rules(['current_password'])
                ->required(),

        ];
    }


    public function submit()
    {
        $data = $this->form->getState();

        Auth::logout();

        $this->user->delete();

        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('home');

        Notification::make()
            ->title('Success!')
            ->body('Account deleted successfully!')
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
        return view('livewire.profile.delete-account');
    }
}
