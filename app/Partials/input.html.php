<div class="<?= $size ?? '' ?>">

    <label class="px-1 text-sm font-semibold text-gray-600" for="<?= $name ?>"><?= $label ?></label>

    <p class="block italic px-1 text-sm text-gray-500"><?= $subLabel ?? '' ?></p>

    <input class="
           <?= $class ?? '' ?> appearance-none block w-full text-gray-700 border border-gray-300 rounded py-2.5 px-4 leading-tight focus:outline-none focus:bg-white focus:border-white"
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

        <?php if (isset($max)): ?>
            max="<?= $max ?>"
        <?php endif; ?>

        <?php if (isset($step)): ?>
            step="<?= $step ?>"
        <?php endif; ?>

        <?php if (isset($autofocus)): ?>
            autofocus
        <?php endif; ?>
    >

    <p class="text-purple-500 italic text-sm"><?= $hint ?? '' ?></p>

    <?php if (isset($relativeIcon)): ?>
        <img src="<?= $relativeIcon ?>" class="absolute inline-block h-6 w-6 bottom-8 right-6 transform -translate-y-full" alt="">
    <?php endif; ?>

    <?= partial('form_error', ['name' => $name]) ?>

</div>