<div class="mb-4 mt-4 <?= $size ?? '' ?>">
    <label class="block text-xs mb-1" for="<?= $name ?>"><?= $label ?></label>
    <textarea class="<?= $class ?? 'h-48' ?> bg-white dark:bg-gray-700 dark:text-white text-black px-2 py-1 shadow focus:outline-none w-full" placeholder="<?= $placeholder ?? '' ?>" name="<?= $name ?>" id="<?= $name ?>" <?php if (isset($required)): ?>required<?php endif; ?>><?= get_input($name) ?? $model->{$name} ?? '' ?></textarea>
    <?= partial('form_error', ['name' => $name]) ?>
</div>