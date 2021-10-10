<div class="p-3">
    <span class="text-lg font-thin"><i class="far fa-arrow-alt-circle-right mr-1.5"></i><?= $group_label ?></span>
    <div class="mt-2 <?= $divClass ?? '' ?>">
        <label class="inline-flex items-center cursor-pointer">
            <input type="radio" class="form-radio h-6 w-6 shadow-lg cursor-pointer" name="<?= $name ?>" id="<?= $option_id_one ?? '' ?>" value="<?= $option_value_one ?? 1 ?>" <?php if (isset($model) && $model->{$name} == 1) { echo 'checked'; } ?>>
            <span class="ml-2"><?= $option_label_one ?? 'Oui' ?></span>
        </label>
        <label class="inline-flex items-center cursor-pointer <?= $labelClass ?? 'ml-6' ?>">
            <input type="radio" class="form-radio h-6 w-6 shadow-lg cursor-pointer" name="<?= $name ?>" id="<?= $option_id_two ?? '' ?>" value="<?= $option_value_two ?? 0 ?>" <?php if (isset($model) && $model->{$name} == 0) { echo 'checked'; } ?>>
            <span class="ml-2"><?= $option_label_two ?? 'Non' ?></span>
        </label>
        <?php if (isset($option_value_three)): ?>
            <label class="inline-flex items-center cursor-pointer <?= $labelClass ?? 'ml-6' ?>">
                <input type="radio" class="form-radio h-6 w-6 shadow-lg cursor-pointer" name="<?= $name ?>" id="<?= $option_id_three ?? '' ?>" value="<?= $option_value_three ?? 0 ?>" <?php if (isset($model) && $model->{$name} == 0) { echo 'checked'; } ?>>
                <span class="ml-2"><?= $option_label_three ?? 'Non' ?></span>
            </label>
        <?php endif; ?>
        <?php if (isset($option_value_four)): ?>
            <label class="inline-flex items-center cursor-pointer <?= $labelClass ?? 'ml-6' ?>">
                <input type="radio" class="form-radio h-6 w-6 shadow-lg cursor-pointer" name="<?= $name ?>" id="<?= $option_id_four ?? '' ?>" value="<?= $option_value_four ?? 0 ?>" <?php if (isset($model) && $model->{$name} == 0) { echo 'checked'; } ?>>
                <span class="ml-2"><?= $option_label_four ?? 'Non' ?></span>
            </label>
        <?php endif; ?>
        <?php if (isset($option_value_five)): ?>
            <label class="inline-flex items-center cursor-pointer <?= $labelClass ?? 'ml-6' ?>">
                <input type="radio" class="form-radio h-6 w-6 shadow-lg cursor-pointer" name="<?= $name ?>" id="<?= $option_id_five ?? '' ?>" value="<?= $option_value_five ?? 0 ?>" <?php if (isset($model) && $model->{$name} == 0) { echo 'checked'; } ?>>
                <span class="ml-2"><?= $option_label_five ?? 'Non' ?></span>
            </label>
        <?php endif; ?>
    </div>
</div>

<style>
    input:checked + span {
        color: #278ea9;
    }
</style>