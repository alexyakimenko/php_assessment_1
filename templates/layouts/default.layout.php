<?php
/**
 * @var string|false $content
 * @var string $title
 */

use App\Core\Config;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Quiz - <?= Config::get('app.name') ?></title>
</head>

<body class="text-gray-950">
<header class="bg-gray-950 text-white p-4 sticky top-0 px-16 flex gap-4 flex-col md:flex-row justify-between md:items-center">
    <a href="/" class="font-bold text-4xl text-blue-300">
        <div><?= Config::get('app.name') ?></div>
    </a>
    <div class="flex flex-col sm:flex-row">
        <a href="/quiz" class="text-white font-bold py-4 px-6 rounded-md cursor-pointer hover:bg-blue-400 transition-colors">Пройти тест</a>
        <a href="/dashboard" class="text-white font-bold py-4 px-6 rounded-md cursor-pointer hover:bg-blue-400 transition-colors">Посмотреть результаты</a>
    </div>
</header>
<main class="container mx-auto p-4">
    <?php echo $content; ?>
</main>

<footer>
</footer>
</body>

</html>