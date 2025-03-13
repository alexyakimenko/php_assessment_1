<?php

namespace App\Controllers;

use App\Core\JsonDB;
use App\Core\Template;

class DashboardController
{
    /**
     * Renders the dashboard view with the history data.
     *
     * @return void
     */
    public static function index(): void {
        $connection = JsonDB::connect('dashboard');
        Template::render('dashboard', ['history' => $connection->getData()]);
    }
}