<label class="inline-flex items-center mt-3" id="<?= $id ?>" for="<?= $name ?>">
    <input
        type="checkbox"
        class="form-checkbox rounded shadow border border-blue-300 bg-opacity-30 h-7 w-7 dark:text-gray-900 cursor-pointer"
        name="<?= $name ?>"
        id="<?= $id ?>"
        <?php if (isset($model->{$name}) && $model->{$name} == 1) { echo 'checked'; } ?>
        <?= get_input($name) === 'on' ? 'checked' : '' ?>
        <?= $state ?? '' ?>
    >
    <span class="ml-2 text-nausicaa-medium"><?= $label ?></span>
</label>