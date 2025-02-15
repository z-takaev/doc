<x-page title="Диапазон">

<x-extendby :href="route('moonshine.custom_page', 'fields-text')">
    Text
</x-extendby>

<x-p>
    Имеет такие же методы как и поле "Число" с дополнительными методами <code>step</code>,
     <code>fromField</code>, <code>toField</code>
</x-p>

<x-p>
    Так как диапазон имеет 2 значения, то необходимо указать эти два поля в базе посредством методов
    <code>fromField</code> и <code>toField</code>
</x-p>

<x-code language="php">
use MoonShine\Fields\SlideField;

//...
public function fields(): array
{
    return [
        SlideField::make('Age')
            ->fromField('age_from') // Поле в таблице для значения "От"
            ->toField('age_to') // Поле в таблице для значения "До"
            ->min(0)
            ->max(60)
            ->step(1) // Шаг ползунка
    ];
}
//...
</x-code>

<x-image theme="light" src="{{ asset('screenshots/slide.png') }}"></x-image>
<x-image theme="dark" src="{{ asset('screenshots/slide_dark.png') }}"></x-image>

</x-page>
