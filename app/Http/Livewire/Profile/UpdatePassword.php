<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class UpdatePassword extends Component implements HasForms
{
    use InteractsWithForms;

    public User $user;
    public $data;

    public function mount()
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('old_password')
                ->required()
                ->password()
                ->rules(['current_password']),

            TextInput::make('password')
                ->password()
                ->minLength(8)
                ->maxLength(255)
                ->reactive()
                ->required(),

            TextInput::make('confirmPassword')
                ->same('password')
                ->required()
                ->password(),
        ];
    }

    protected function getFormStatePath(): string
    {
        return 'data';
    }

    public function submit()
    {
        $data = $this->form->getState();
        $this->user->fill([
            'password' => Hash::make($data['password'])
        ]);
        $this->user->save();
        notification::make()
            ->title('Success!')
            ->body('Password updated successfully!')
            ->success()
            ->send();
        $this->form->fill();
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
        return view('livewire.profile.update-password');
    }
}
