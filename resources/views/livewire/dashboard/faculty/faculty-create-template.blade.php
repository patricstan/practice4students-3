<x-layouts.modal>

    <form wire:submit.prevent="createTemplate" class="pt-8">
        {{$this->templateForm}}
    </form>
</x-layouts.modal>