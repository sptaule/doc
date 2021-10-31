<?php if (get_error($name)): ?>
    <p class="p-1 my-2 text-center text-sm text-red-700 bg-red-100 shadow animate-pulse">
        <?= get_error($name); ?>
    </p>
<?php endif; ?>