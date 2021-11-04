<div class="flex items-center my-1.5">
    <input
        type="checkbox"
        class="<?= $checkboxClass ?? '' ?> form-checkbox focus:outline-none focus:bg-white focus:border-white bg-white h-8 w-8 rounded cursor-pointer"
        name="<?= $name ?>"
        id="<?= $id ?>"
        <?php if (isset($model->{$name}) && $model->{$name} == 1) { echo 'checked'; } ?>
        <?php if (isset($toggle)): ?>
            data-toggle="<?= $toggle; ?>"
        <?php endif; ?>
        <?= get_input($name) === 'on' ? 'checked' : '' ?>
        <?php if (isset($arrayInputName)): ?>
            <?= get_input_array($arrayInputName, $id) === 'on' ? 'checked' : '' ?>
        <?php endif; ?>
        <?= $state ?? '' ?>
    >
    <label class="ml-2 flex flex-col items-start cursor-pointer select-none" id="<?= $id ?>" for="<?= $id ?>">
        <span class="text-sm text-gray-600 font-semibold" style="color: <?= $labelColor ?? '#484848' ?>"><?= $label ?></span>
        <span class="text-gray-500 text-sm italic"><?= $subLabel ?? '' ?></span>
    </label>
</div>

<?php if (isset($toggle)): ?>
<!--Will toggle (when checkbox checked) the element with class 'foobar' (defined in $toggle)-->
    <script>
        $('#<?= $id ?>').on('change', function () {
            $('.' + $(this).data('toggle')).toggle();
        });
    </script>
<?php endif; ?>