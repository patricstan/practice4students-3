<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Component;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;

class DocumentFillLayout extends Component
{
    protected string $view = 'forms.components.document-fill-layout';


    protected string $documentLayout = '';
    protected string $content = '';

    public static function make(): static
    {
        return new static();
    }


    public function setDocumentLayout(string $htmlLayout): static
    {
        $this->documentLayout = $htmlLayout;
        return $this;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;
        return $this;
    }

    public function renderDocument()
    {
        $content = $this->getChildComponentContainer();
        $comp = $content->getComponents();
        // dd($comp);
        return new HtmlString(Blade::render($this->content, $comp, deleteCachedView: true));
    }
}
