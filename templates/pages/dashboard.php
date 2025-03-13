<?php
/**
 * @var array $history
 */
?>
<h1 class="font-bold text-4xl">Результаты <span class="text-blue-400">Quiz</span></h1>
<div>
    <table class="w-full mt-8 text-xl">
        <thead>
            <tr class="bg-gray-950 text-white">
                <th>Name</th>
                <th>Score</th>
                <th>Percantage</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($history as $item): ?>
                <tr class="bg-white hover:bg-gray-100 transition-all cursor-pointer hover:scale-105">
                    <td class="py-2 px-4"><?= $item['name'] ?></td>
                    <td class="py-2 px-4 text-end"><?= $item['score'] ?></td>
                    <td class="py-2 px-4 font-bold text-end"><?= $item['percentage'] ?>%</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div>
        <a href="/quiz"><button class="bg-blue-400 text-white font-bold py-4 px-6 rounded-md cursor-pointer mt-8">Пройти тест</button></a>
        <a href="/"><button class="bg-gray-950 text-white font-bold py-4 px-6 rounded-md cursor-pointer mt-8">На главную</button></a>
    </div>
</div>