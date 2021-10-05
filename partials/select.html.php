<style>
    html.theme-dark .nice-select ul.list {
        background: #1a1c23;
    }
    html.theme-dark .nice-select ul.list li:hover, html.theme-dark .nice-select ul.list li.option.selected.focus, html.theme-dark .nice-select ul.list li.option.selected.focus:hover {
        background: #383a42;
    }
    .nice-select { height: 49px !important; line-height: 43px !important; font-size: 15px !important; margin-top: 3px !important; border: 2px solid #D1D5DB !important; }
</style>

<div class="<?= $size ?? '' ?>">
    <label class="block px-1 text-sm text-gray-600" for="<?= $name ?>"><?= $label ?></label>
    <select name="<?= $name ?>" id="<?= $name ?>" class="<?= $customSelectClass ?? "" ?> block dark:bg-gray-700 dark:text-white w-max text-nausicaa-darkest focus:outline-none">
        <?php if (isset($session_option_label) || isset($default_option_label)): ?>
            <option value="<?= $session_option_value ?? $default_option_value ?? "" ?>"><?= $session_option_label ?? $default_option_label ?></option>
        <?php endif; ?>
        <?php foreach ($options as $option): ?>
            <option class="<?= $option->colorclass ?? '' ?> text-white dark:bg-gray-700" value="<?= $option->id ?>" <?= $option->id == ($_SESSION['search'][$name] ?? get_input($name) ?? $model->{$name} ?? null) ? 'selected' : '' ?>>
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
