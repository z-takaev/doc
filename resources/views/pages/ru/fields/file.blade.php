<x-page title="Файл" :sectionMenu="[
    'Разделы' => [
        ['url' => '#multiple', 'label' => 'Мультизагрузка'],
        ['url' => '#removable', 'label' => 'Удаление файлов'],
        ['url' => '#download', 'label' => 'Запрет на скачивание'],
        ['url' => '#filename', 'label' => 'Оригинальное имя файла'],
    ]
]">

<x-p>
    Прежде чем использовать файловое поле, необходимо убедиться что на директорию storage
    установлена символическая ссылка
</x-p>

<x-code language="shell">
    php artisan storage:link
</x-code>

<x-code language="php">
use MoonShine\Fields\File;

//...
public function fields(): array
{
    return [
        //...
        // [tl! focus:start]
        File::make('File', 'file')
            ->dir('/') // Директория где будут хранится файлы в storage (по умолчанию /)
            ->disk('public') // Filesystems disk
            ->allowedExtensions(['jpg', 'gif', 'png']) // Допустимые расширения
        // [tl! focus:end]
        //...
    ];
}
//...
</x-code>

<x-image theme="light" src="{{ asset('screenshots/file.png') }}"></x-image>
<x-image theme="dark" src="{{ asset('screenshots/file_dark.png') }}"></x-image>

<x-sub-title id="multiple">Мультизагрузка</x-sub-title>

<x-p>
    Для загрузки нескольких файлов используется метод <code>multiple</code>
</x-p>

<x-code language="php">
use MoonShine\Fields\File;

//...
public function fields(): array
{
    return [
        //...
        File::make('File', 'file')
            ->multiple(), // [tl! focus]
        //...
    ];
}
//...
</x-code>

<x-moonshine::alert type="default" icon="heroicons.information-circle">
    Поле в базе необходимо типа text или json.<br>
    Также необходимо добавить cast для eloquent модели - json или array или collection.
</x-moonshine::alert>

<x-sub-title id="removable">Удаление файлов</x-sub-title>

<x-p>
    Для возможности удаления файлов, необходимо воспользоваться методом <code>removable</code>
</x-p>

<x-code language="php">
use MoonShine\Fields\File;

//...
public function fields(): array
{
    return [
        //...
        File::make('File', 'file')
            ->removable(), // [tl! focus]
        //...
    ];
}
//...
</x-code>

<x-sub-title id="download">Запрет на скачивание</x-sub-title>

<x-p>
    Если необходимо исключить возможность скачивания файла воспользуйтесь методом <code>disableDownload</code>
</x-p>

<x-code language="php">
use MoonShine\Fields\File;

//...
public function fields(): array
{
    return [
        //...
        File::make('File', 'file')
            ->disableDownload(), // [tl! focus]
        //...
    ];
}
//...
</x-code>

<x-sub-title id="filename">Оригинальное имя файла</x-sub-title>

<x-p>
    Если необходимо сохранять оригинальное имя файла от клиента воспользуйтесь методом <code>keepOriginalFileName</code>
</x-p>

<x-code language="php">
use MoonShine\Fields\File;

//...
public function fields(): array
{
    return [
        //...
        File::make('File', 'file')
            ->keepOriginalFileName(), // [tl! focus]
        //...
    ];
}
//...
</x-code>

</x-page>
