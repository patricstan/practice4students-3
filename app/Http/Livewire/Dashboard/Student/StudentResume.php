<?php

namespace App\Http\Livewire\Dashboard\Student;

use App\Models\Student;
use App\View\Components\Layouts\Dashboard;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StudentResume extends Component implements HasForms
{
    use InteractsWithForms;

    public Student $student;
    public $data;

    public function mount(): void
    {
        $this->student = Auth::user()->student;
        $this->form->fill([
            // $this->student
            'name' => $this->student->user->name,
            'specialization' => $this->student->specialization,
            'last_year_grade' => $this->student->last_year_grade,
            'phone' => $this->student->user->phone,
            'email' => $this->student->user->email,
            'about' => $this->student->about,
            'skills' => $this->student->skills,
            'foreign_languages' => $this->student->foreign_languages,
            'hobbies' => $this->student->hobbies,
            'education' => $this->student->education,
            'experience' => $this->student->experience,
            'projects' => $this->student->projects,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Card::make()
                ->schema([
                    Grid::make(2)
                        ->schema([
                            SpatieMediaLibraryFileUpload::make('picture')
                                ->label('Picture')
                                ->image()
                                ->imageResizeTargetWidth('35')
                                ->imageResizeTargetHeight('35')
                                ->preserveFilenames()
                                ->collection('student_picture')
                                ->columnSpan(1),
                            Card::make()
                                ->schema([
                                    TextInput::make('name'),
                                    TextInput::make('specialization'),
                                    TextInput::make('last_year_grade'),
                                    TextInput::make('phone'),
                                    TextInput::make('email')
                                ])
                                ->columnSpan(1)

                        ]),
                    Textarea::make('about')->label('About me'),
                    TagsInput::make('skills'),
                    TagsInput::make('foreign_languages'),
                    TagsInput::make('hobbies'),
                    Repeater::make('education')
                        ->schema([
                            DatePicker::make('start_year')
                                ->displayFormat('Y')
                                ->format('Y'),
                            DatePicker::make('graduation_year')
                                ->displayFormat('Y')
                                ->format('Y'),
                            TextInput::make('institution'),
                            TextInput::make('specialization')
                        ]),
                    Repeater::make('experience')
                        ->schema([
                            DatePicker::make('start_date'),
                            DatePicker::make('end_date'),
                            TextInput::make('position'),
                            TextInput::make('company'),
                            Textarea::make('description'),
                        ]),
                    Repeater::make('projects')
                        ->schema([
                            DatePicker::make('start_date'),
                            DatePicker::make('end_date'),
                            TextInput::make('title'),
                            Textarea::make('description'),
                        ])
                ])
        ];
    }
    public function save()
    {
        $this->form->getState();

        $this->student->update($this->data);
        Notification::make()
            ->title('CV updated successfully!')
            ->success()
            ->send();
    }

    protected function getFormStatePath(): string
    {
        return 'data';
    }

    protected function getFormModel(): Student
    {
        return $this->student;
    }


    public function render()
    {
        return view('livewire.dashboard.student.student-resume')
            ->layout(Dashboard::class, ['title' => 'Resume']);
    }
}
