<div class="mb-4 mt-4 <?= $size ?? '' ?>">
    <label class="px-1 text-sm text-gray-600" for="<?= $name ?>"><?= $label ?></label>
    <textarea
        class="<?= $class ?? 'h-48' ?> appearance-none block w-full text-gray-700 border border-gray-300 rounded py-2.5 px-4 leading-tight focus:outline-none focus:bg-white focus:border-white"
        placeholder="<?= $placeholder ?? '' ?>"
        name="<?= $name ?>"
        id="<?= $name ?>"
        <?php if (isset($required)): ?>required<?php endif; ?>
    ><?= get_input($name) ?? $model->{$name} ?? '' ?></textarea>
    <?= partial('form_error', ['name' => $name]) ?>
</div>