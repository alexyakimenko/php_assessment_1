<?php
/**
 * @var string $name
 * @var int $score
 * @var int $percentage
 */
?>
<h1 class="font-bold text-4xl">Спасибо за ответ, <span class="text-blue-400"><?= $name ?></span></h1>
<div class="mt-24 flex flex-col items-center gap-4 text-2xl">
    <h2 class="">Ваш Счет: <span class="font-bold"><?= $score ?></span></h2>
    <h2>Правильных ответов: <span class="font-bold"><?= $percentage ?>%</span></h2>
</div>
<!--Пройти тест еще раз-->
<div class="mt-8 flex flex-col items-center gap-4">
    <a href="/quiz"><button class="bg-blue-400 text-white font-bold py-4 px-6 rounded-md cursor-pointer">Пройти тест еще раз</button></a>
    <a href="/dashboard"><button  class="bg-gray-950 text-white font-bold py-4 px-6 rounded-md cursor-pointer">Посмотреть результаты</button></a>
</div>