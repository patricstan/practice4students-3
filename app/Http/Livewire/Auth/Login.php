<?php

namespace App\Http\Livewire\Auth;

use App\View\Components\Layouts\Auth;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Login extends Component implements HasForms
{
    use InteractsWithForms;

    public $data;

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('email')
                ->email()
                ->required(),
            TextInput::make('password')
                ->password()
                ->required(),
            Checkbox::make('remember')
                ->default(false)
                ->label('Remember Me')
        ];
    }
    protected function onValidationError(ValidationException $exception): void
    {
        Notification::make()
            ->title($exception->getMessage())
            ->danger()
            ->send();
    }

    protected function getFormStatePath(): ?string
    {
        return 'data';
    }

    protected function prepareUserData($data): array
    {
        $user = [
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'remember' =>  $data['remember'] ?? false
        ];

        return $user;
    }

    public function submit()
    {
        // Try to autenthicate user.
        // If remeber checkbox was not filled, automatically select false, otherwise the value
        $user = $this->prepareUserData($this->form->getState());
        if (!FacadesAuth::attempt(['email' => $user['email'], 'password' => $user['password']], $user['remember'])) {
            throw ValidationException::withMessages([
                'data.email' => "Invalid email or password!",

                'data.password' => "Invalid email or password",
            ]);
        }
        session()->regenerate();
        return redirect()->intended(route('home'));
    }
    public function render(): View
    {
        return view('livewire.auth.login')
            ->layout(Auth::class);
    }
}
