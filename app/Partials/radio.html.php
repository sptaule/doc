<div class="p-3 flex flex-col space-y-2">
    <span class="text-lg font-light rounded-lg text-gray-700"><i class="far fa-dot-circle mr-1.5 text-scuba-green"></i><?= $groupLabel ?></span>
    <?php if (isset($subLabel)): ?>
        <span class="text-sm text-gray-500 italic"><?= $subLabel ?></span>
    <?php endif; ?>
    <?php foreach ($options as $k => $option): ?>
        <label class="inline-flex items-center cursor-pointer">
            <input type="radio" class="form-radio focus:outline-none text-scuba-green focus:bg-white focus:border-white bg-white h-6 w-6 cursor-pointer" value="<?= $k ?>" name="<?= $name ?>" <?= $k == $value ? 'checked' : '' ?>>
            <span class="ml-2 text-gray-700"><?= $option ?? 'Option' ?></span>
        </label>
    <?php endforeach; ?>
</div>

<style>
    input:checked + span {
        color: #278ea9;
    }
</style>