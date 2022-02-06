<?php

use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

/*
Artisan::command('exportCategories', function () {
    $categories = Category::get()->toArray();
    $file = fopen('exportCategories.csv', 'w');
    $columns = [
        'id',
        'name',
        'description',
        'picture',
        'created_at',
        'updated_at'
    ];
    fputcsv($file, $columns, ';');
    foreach ($categories as $category) {
        $category['name'] = iconv('utf-8', 'windows-1251//IGNORE', $category['name']);
        $category['description'] = iconv('utf-8', 'windows-1251//IGNORE', $category['description']);
        $category['picture'] = iconv('utf-8', 'windows-1251//IGNORE', $category['picture']);
        fputcsv($file, $category, ';');
    }
    fclose($file);
});
*/

Artisan::command('importCategories', function () {
    $fileName = 'categories.csv';
    $file = fopen($fileName, 'r');

    $carbon = new Carbon();
    $now = $carbon->now()->toDateTimeString();

    $i = 0;
    $insert = [];
    while ($data = fgetcsv($file, 1000, ';')) {
        if ($i++ == 0) continue;
        $insert[] = [
            'name' => $data[0],
            'description' => $data[1],
            'picture' => $data[2],
            'created_at' => $now,
            'updated_at' => $now
        ];
    }
    Category::insert($insert);
});

Artisan::command('createRolesUsers', function () {
/* 
    collect(['Admin', 'Manager', 'Customer'])->each(function ($role, $idx) {
        $role = new Role([
            'name' => $role
        ]);
        $role->save();
     });
*/

    $user = User::find(1);

    collect(['Admin', 'Manager', 'Customer'])->each(function ($name, $idx) use ($user) {
        $role = Role::where('name', $name)->first();
        $user->roles()->attach($role);
    });

/*
    $user->roles->each(function ($role) {
        dump($role->pivot->created_at->toDateTimeString());
    });

*/
});

Artisan::command('inspire', function () {

    // Создание записей в таблице
    $procs = new Category();
    $procs->name = 'Диски';
    $procs->description = 'Описание дисков';
//    $procs->picture = '';
//    $procs->save();

// Заполняет поля разрешенные в модели Category!!!
/*
     Category::create([
         'name' => 'Шины',
         'description' => 'Описание шин',
         'picture' => ''
     ]);
*/
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
