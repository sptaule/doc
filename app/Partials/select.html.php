<style>
    .nice-select { height: 46px !important; line-height: 41px !important; font-size: 16px !important; margin-top: 3px !important; border: 2px solid #D1D5DB !important; color: #393a3d; }
</style>

<div class="<?= $size ?? '' ?>">
    <label class="block px-1 text-sm text-gray-600" for="<?= $name ?>"><?= $label ?></label>
    <select name="<?= $name ?>" id="<?= $name ?>" class="<?= $customSelectClass ?? "" ?> block dark:bg-gray-700 dark:text-white w-max focus:outline-none">
        <?php if (isset($session_option_label) || isset($default_option_label)): ?>
            <option value="<?= $session_option_value ?? $default_option_value ?? "" ?>"><?= $session_option_label ?? $default_option_label ?></option>
        <?php endif; ?>
        <?php foreach ($options as $option): ?>
            <option class="<?= $option->colorclass ?? '' ?> text-white" value="<?= $option->id ?>" <?= $option->id == ($_SESSION['search'][$name] ?? get_input($name) ?? $model->{$name} ?? null) ? 'selected' : '' ?>>
                <?= $option->{$option_key_label} ?>
            </option>
        <?php endforeach ?>
    </select>
    <?= partial('form_error', ['name' => $name]) ?>
</div>

<?php if (isset($customSelectClass)): ?>
    <script>
        $(function() {
            $('.<?= $customSelectClass ?>').niceSelect();
        });
    </script>
<?php else: ?>
    <script>
        $(function() {
            $('#<?= $name ?>').niceSelect();
        });
    </script>
<?php endif; ?>
