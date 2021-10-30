<style>
    .nice-select { height: 44px !important; line-height: 40px !important; font-size: 16px !important; margin-top: 1px !important; border: 1px solid #D1D5DB !important; color: #393a3d; z-index: 15 !important; }
    .nice-select:hover { border: 1px solid #2563EB !important; }
    .nice-select ul { border: 0px solid #2563EB !important; -webkit-box-shadow: 0 0 20px 5px rgba(4,10,23,0.25) !important; box-shadow: 0 0 20px 5px rgba(4,10,23,0.25) !important; }
    .nice-select li.option:hover, .nice-select li.option.selected:hover { background: #b2daf8 !important; }
</style>

<div class="<?= $size ?? '' ?>">
    <label class="block px-1 text-sm font-semibold text-gray-700 mt-0.5" for="<?= $name ?>"><?= $label ?></label>
    <p class="block italic px-1 text-sm text-gray-500"><?= $subLabel ?? '' ?></p>
    <select name="<?= $name ?>" id="<?= $name ?>" class="block dark:bg-gray-700 dark:text-white w-max focus:outline-none <?= $customSelectClass ?? "" ?>">
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

<!--If the select has a different id (name) to initialize niceSelect-->
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

<!--Display the select options like a table-->
<?php if (isset($tableDisplay) && $tableDisplay === true): ?>
    <script>
        $(function() {
            let ul = $('select#<?= $name; ?>').next().find("ul");
            let wi = $(window).width(), count = $(ul).children().length, columns;
            count % 2 == 0 ? columns = 4 : columns = 3;
            if (wi >= 865) {
                ul.addClass(`w-max grid grid-cols-${columns} gap-<?= $gap ?? 0; ?>`)
            }
        });
    </script>
<?php endif; ?>
