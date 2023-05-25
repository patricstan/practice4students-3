<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use App\Models\Company;
use App\Models\Student;
use App\View\Components\Layouts\Auth;
use Closure;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Register extends Component implements HasForms
{
    use InteractsWithForms;

    public $data;

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->maxLength(255)
                ->required(),

            TextInput::make('email')
                ->maxLength(255)
                ->email()
                ->required()
                ->unique(table: User::class),

            TextInput::make('phone')
                ->maxLength(255)
                ->required(),

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

            Select::make('role')
                ->required()
                ->reactive()
                ->options([
                    'student' => 'Student',
                    'company' => 'Company Representative'
                ]),

            TextInput::make('companyName')
                ->maxLength(255)
                ->hidden(fn (Closure $get) => $get('role') !== 'company')
                ->disabled(fn (Closure $get) => $get('role') !== 'company')
                ->required(fn (Closure $get) => $get('role') == 'company')
                ->unique(table: Company::class, column: 'company_name')
        ];
    }

    protected function getFormStatePath(): ?string
    {
        return 'data';
    }

    protected function onValidationError(ValidationException $exception): void
    {
        Notification::make()
            ->title($exception->getMessage())
            ->danger()
            ->send();
    }

    protected function prepareUserData($data): array
    {
        $user = [
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'phone' => $this->data['phone'],
            'password' => Hash::make($this->data['password']),
            'role' => $this->data['role'],
            'companyName' => $this->data['companyName'] ?? ''
        ];

        return $user;
    }

    public function submit()
    {

        $userData = $this->prepareUserData($this->form->getState());
        $user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'phone' => $userData['phone'],
            'password' => $userData['password'],
            'role' => $userData['role']
        ]);

        switch ($userData['role']) {
            case "company":
                $company = new Company(['company_name' => $userData['companyName'], 'logo' => "https://placehold.co/600x400"]);
                $user->company()->save($company);
                break;

            case "student":
                $student = new Student();
                $user->student()->save($student);
                break;
        }

        event(new Registered($user));

        FacadesAuth::login($user);

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->layout(Auth::class, [
                'cta_title' => 'Create a new account', 'cta_alt' => 'sign in to your account',
                'alt_link' => route('login')
            ]);
    }
}
