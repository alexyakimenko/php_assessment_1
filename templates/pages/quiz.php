<?php
/**
 * @var array $questions
 */
?>
<h1 class="font-bold text-4xl">Quiz</h1>

<form action="/quiz" method="post" class="mt-8 px-8 text-xl flex flex-col gap-4">
    <div class="flex flex-col">
        <label for="name" >Введите ваше имя:</label>
        <input id="name" type="text" value="<?= $submit['name'] ?? '' ?>" placeholder="Ваше имя" name="name" required maxlength="30" minlength="2" class="max-w-128 w-full bg-gray-100 rounded-md py-2 px-4 mt-2" />
        <?php if(isset($name_error)): ?>
            <p class="text-red-500"><?= $name_error ?></p>
        <?php endif; ?>
    </div>
    <?php foreach ($questions as $question): ?>
        <div class="bg-gray-100 py-4 px-8 rounded-xl">
            <h3 class="font-bold"><?= $question['question'] ?></h3>
            <div class="mt-2 flex flex-col gap-2">
                <?php foreach ($question['answers'] as $answer): ?>
                    <?php
                        $checked = isset($submit['answers'][$question['id']]) && in_array($answer['id'], $submit['answers'][$question['id']]);
                    ?>
                    <div class="flex items-center gap-2">
                        <input class="accent-gray-950" type="<?= $question['type'] ?>" id="<?= $answer['id'] ?>" name="answers[<?= $question['id'] ?>][]" value="<?= $answer['id'] ?>" <?= $checked ? 'checked' : '' ?> />
                        <label for="<?= $answer['id'] ?>"><?= $answer['text'] ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
    <button type="submit" class="bg-blue-400 text-white font-bold py-4 px-6 rounded-md cursor-pointer self-start">Завершить</button>
</form>
