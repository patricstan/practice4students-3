<div class="mx-4" x-data="{expanded: true}">
    <h1 class="mb-4 text-4xl font-bold text-gray-500 cursor-pointer" @click="expanded = !expanded">
        {{$title}}
        <i class="fa-solid fa-2xs" :class="expanded ? 'fa-chevron-down' : 'fa-chevron-up'"></i>
    </h1>

    <div class="mb-4 text-lg dark:text-gray-300" x-show="expanded" x-collapse>
        {{$slot}}
    </div>
</div>