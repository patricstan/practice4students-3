<?php

namespace App\Services;

use App\Forms\Components\DocumentFillLayout;
use App\Forms\Components\DocumentLayout;
use App\Models\CompanyDocument;
use App\Models\Document;
use App\Models\DocumentStudent;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\HtmlString;
use Savannabits\SignaturePad\Forms\Components\Fields\SignaturePad;

class DocumentFillService
{
    protected CompanyDocument|DocumentStudent $document;

    public function __construct(DocumentStudent|CompanyDocument $record)
    {
        $this->document = $record;
    }


    public function getFormSchema(): array
    {
        return [
            Grid::make(2)
                ->schema(
                    function () {
                        $document = file_get_contents($this->document->document->html_path);
                        return [
                            Section::make('configurator')
                                ->schema(
                                    fn () => $this->getFields($document)
                                )

                                ->extraAttributes(['class' => 'overflow-y-auto', 'style' => 'max-height:500px'])
                                ->columnSpan(1),

                            Placeholder::make('preview')
                                // ->disableLabel()

                                ->extraAttributes(['class' => 'overflow-y-auto', 'style' => 'max-height:500px'])
                                ->content(new HtmlString($document))
                        ];
                    }
                )
        ];
    }



    protected function getFields(): array
    {
        $fields = [];
        $data = $this->document->data;

        $currentUserRole = auth()->check() ? auth()->user()->role : 'MENTOR';
        foreach ($data as $dataKey => $dataVal) {
            $explodedKey = explode('_', $dataKey);
            if (
                strcmp(strtoupper(substr($currentUserRole, 0, 3)), $explodedKey[0]) == 0
            ) {
                switch ($explodedKey[1]) {
                    case 'TXTS':
                        $fields[$dataKey] = TextInput::make($dataKey)->label('placeholder_' . $explodedKey[2]);
                        break;
                    case 'TXTL':
                        $fields[$dataKey] = Textarea::make($dataKey)->label('placeholder_' . $explodedKey[2]);
                        break;
                    case 'DATE':
                        $fields[$dataKey] = DatePicker::make($dataKey)->label('placeholder_' . $explodedKey[2]);
                        break;
                    case 'SIGN':
                        $fields[$dataKey] = $dataVal == '' ? SignaturePad::make($dataKey)->label('placeholder_' . $explodedKey[2])
                            ->hideDownloadButtons() : Placeholder::make($dataKey)->content(new HtmlString('<img src="' . $dataVal . '" />'))
                            ->label('placeholder_' . $explodedKey[2]);
                        break;
                    case 'STAMP':
                        $fields[$dataKey] = TextInput::make($dataKey)->label('placeholder_' . $explodedKey[2]);
                        break;
                }
            } else {
                if ($explodedKey[1] == 'SIGN') {
                    $fields[$dataKey] = Placeholder::make($dataKey)->content(new HtmlString('<img src="' . $dataVal . '" />'))->label('placeholder_' . $explodedKey[2]);
                } else {
                    $fields[$dataKey] = Placeholder::make($dataKey)->content(new HtmlString('<b>' . ($dataVal ? $dataVal : '-') . '</b>'))->label('placeholder_' . $explodedKey[2]);
                }
            }
        }
        return $fields;
    }
}
