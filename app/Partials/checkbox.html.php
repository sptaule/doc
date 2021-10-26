<div class="flex items-center my-1.5">
    <input
        type="checkbox"
        class="form-checkbox rounded shadow border text-scuba-green focus:outline-none border-blue-300 bg-opacity-30 h-7 w-7 cursor-pointer"
        name="<?= $name ?>"
        id="<?= $id ?>"
        <?php if (isset($model->{$name}) && $model->{$name} == 1) { echo 'checked'; } ?>
        <?php if (isset($toggle)): ?>
            data-toggle="<?= $toggle; ?>"
        <?php endif; ?>
        <?= get_input($name) === 'on' ? 'checked' : '' ?>
        <?= $state ?? '' ?>
    >
    <label class="ml-2 flex flex-col items-start cursor-pointer" id="<?= $id ?>" for="<?= $name ?>">
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