<?php

Route::get('/test', function () {

    /*
    return Role::create([
        'name' => 'Admin',
        'slug' => 'admin',
        'description' => 'Administrator',
        'full-access' => 'yes',
    ]);

    return Role::create([
        'name' => 'Guest',
        'slug' => 'guest',
        'description' => 'Guest',
        'full-access' => 'no',
    ]);

    return Role::create([
        'name' => 'Test',
        'slug' => 'test',
        'description' => 'Test',
        'full-access' => 'no',
    ]);
    */

    //$user = User::find(1);

    //con attach creamos registros, pero si refrescamos vuelve a generar los mismos registros
    //$user->roles()->attach([1,3]);

    //con detach eliminamos registros
    //$user->roles()->detach([1,3]);

    //el metodo a utilizar en sync, el mismos hace detach y el attach
    //$user->roles()->sync([1,2]);

    //return $user->roles;

    /*
    return Permission::create([
        'name' => 'List career',
        'slug' => 'career.index',
        'description' => 'A user can list the races',
    ]);
    */

    $role= Role::find(2);

    $role->permissions()->sync([1,2]);

    return $role->permissions;

});
