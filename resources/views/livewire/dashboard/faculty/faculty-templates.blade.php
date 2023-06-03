<div>
    <x-slot:button>
        <a href="{{route('faculty.template.create')}}">
            <x-app.primary-button>Create Template</x-app.primary-button>
        </a>
        </x-slot>

        {{$this->table}}
</div>