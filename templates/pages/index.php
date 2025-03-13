<?php
/**
 * @var string $title
 */

use App\Core\Config;

?>
<div class="flex flex-col items-center justify-center items-center mt-20">
    <h1 class="font-bold text-4xl">Welcome to <span class="text-blue-400"><?= Config::get('app.name') ?></span></h1>
    <div class="mt-24 flex flex-col items-center gap-4">
        <a href="/quiz"><button class="bg-blue-400 text-white font-bold py-4 px-6 rounded-md cursor-pointer">Пройти тест</button></a>
        <a href="/dashboard"><button  class="bg-gray-950 text-white font-bold py-4 px-6 rounded-md cursor-pointer">Посмотреть результаты</button></a>
    </div>
</div>