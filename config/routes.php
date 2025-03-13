<?php

use App\Controllers\DashboardController;
use App\Controllers\MainController;
use App\Controllers\QuizController;

return [
    'get' => [MainController::class, 'index'],
    'quiz' => [
        'get' => [QuizController::class, 'index'],
        'post' => [QuizController::class, 'submit']
    ],
    'dashboard' => [
        'get' => [DashboardController::class, 'index'],
    ]
];