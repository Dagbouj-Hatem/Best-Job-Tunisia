<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('entreprise')->user();

    //dd($users);

    return view('entreprise.home');
})->name('home');

