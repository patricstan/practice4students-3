<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Component;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;

class DocumentLayout extends Component
{
    protected string $view = 'forms.components.document-layout';
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
        // return Blade::render($this->documentLayout, ['slot' => $content], deleteCachedView: true);
        // return new HtmlString(Blade::render($this->documentLayout, ['slot' => $content], deleteCachedView: true));
        $comp = $content->getComponents();
        // $plc = [];
        // for ($i = 0; $i < count($comp); $i++) {
        //     $plc['placeholder_' . $i] = $comp[$i];
        // }
        // return new HtmlString(Blade::render($this->content, $plc, deleteCachedView: true));

        // return new HtmlString(Blade::render(
        //     $this->documentLayout,
        //     ['slot' => new HtmlString(Blade::render($this->content, $comp, deleteCachedView: true))],
        //     deleteCachedView: true
        // ));

        return new HtmlString(Blade::render($this->content, $comp, deleteCachedView: true));
        // dd($content);
        // return new HtmlString(Blade::render(
        //     $this->documentLayout,
        //     ['slot' => new HtmlString(Blade::render($this->content, $content, deleteCachedView: true))],
        //     deleteCachedView: true
        // ));
    }
}
