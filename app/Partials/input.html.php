<div class="<?= $size ?? '' ?>">
    <label class="px-1 text-sm text-gray-600" for="<?= $name ?>"><?= $label ?></label>
    <input class="<?= $class ?? '' ?> appearance-none block w-full bg-gray-50 text-gray-700 border-2 border-gray-300 rounded py-2.5 px-4 leading-tight focus:outline-none focus:bg-white focus:border-white"
           type="<?= $type ?? 'text' ?>"
           name="<?= $name ?>"
           id="<?= $name ?>"
           value="<?= get_input($name) ?? $model_value ?? $model->{$name} ?? $default_value ?? '' ?>"
           placeholder="<?= $placeholder ?? '' ?>"
           maxlength="<?= $maxlength ?? '' ?>"
           <?php if (isset($required)): ?>
            required
           <?php endif; ?>
            <?php if (isset($min)): ?>
                min="<?= $min ?>"
            <?php endif; ?>
           <?php if (isset($step)): ?>
            step="<?= $step ?>"
           <?php endif; ?>>
    <p class="text-purple-500 italic text-sm"><?= $hint ?? '' ?>
        <?= partial('form_error', ['name' => $name]) ?>
</div>