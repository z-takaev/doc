<x-page title="IsEmptyFilter/IsNotEmptyFilter">

<x-extendby :href="route('moonshine.custom_page', 'filters-switch')">
    SwitchBooleanFilter
</x-extendby>

<x-p>Allows displaying only rows that have empty (not empty for IsNotEmptyFilter) field values</x-p>

<x-p>Empty values are:</x-p>
<x-ul :items="['NULL', '\'\'', 0]"></x-ul>

<x-code language="php">
use MoonShine\Filters\IsEmptyFilter;
use MoonShine\Filters\IsNotEmptyFilter;

//...

public function filters(): array
{
    return [
        IsEmptyFilter::make('Url'),
        IsNotEmptyFilter::make('Active')
    ];
}

//...
</x-code>

<x-image theme="light" src="{{ asset('screenshots/filter_is_empty.png') }}"></x-image>
<x-image theme="dark" src="{{ asset('screenshots/filter_is_empty_dark.png') }}"></x-image>

</x-page>
