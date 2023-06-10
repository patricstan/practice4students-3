<div>
    <form wire:submit.prevent="handleUpload">
        {{$this->uploadForm}}
    </form>
    <form wire:submit.prevent="submit">
        {{$this->templateForm}}
    </form>
</div>