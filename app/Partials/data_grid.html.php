<!-- ListJS -->
<script src="<?= LIST_JS . 'js' ?>"></script>
<!-- jQueryUI -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

<style>
    .list{font-family:sans-serif}td{padding:10px;}input{border:solid 1px #ccc;border-radius:5px;padding:5px 14px;}input:focus{outline:0;border-color:#aaa}.sort{padding:8px 10px;border-radius:3px;border:none;display:inline-block;color:#fff;text-decoration:none;}.sort:hover{text-decoration:none;}.sort:focus{outline:0}.sort:after{display:inline-block;width:0;height:0;border-left:5px solid transparent;border-right:5px solid transparent;border-bottom:5px solid transparent;content:"";position:relative;top:-10px;right:-2px}.sort.asc:after{width:0;height:0;border-left:5px solid transparent;border-right:5px solid transparent;border-top:5px solid #fff;content:"";position:relative;top:4px;right:-2px}.sort.desc:after{width:0;height:0;border-left:5px solid transparent;border-right:5px solid transparent;border-bottom:5px solid #fff;content:"";position:relative;top:-4px;right:-2px}
    .pagination li{display:block;padding:6px 0;background: #d7d6d6;border-radius:4px;border-bottom:2px #525259 solid;}.pagination li:hover{background:#8edbe7;}.pagination li:focus{background:#8edbe7;}.pagination li a{padding:12px}
</style>

<?php if ($data): ?>
<div id="resultList">

    <div class="flex items-center space-x-1">
        <input class="search" placeholder="Rechercher..." />

        <?php foreach ($columns as $key => $column): ?>
            <button class="sort bg-cool-gray-400 hover:bg-cool-gray-500 focus:bg-cool-gray-500 text-sm" data-sort="<?= $key; ?>">
                <b><?= $column['label']; ?></b>
            </button>
        <?php endforeach; ?>
    </div>

    <table class="min-w-full my-4 border-l-4 border-r-4">
        <thead class="bg-green-50 border-l-4 border-r-4 border-b border-t border-green-100">
            <tr>
                <?php foreach ($columns as $key => $column): ?>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"><?= $column['label']; ?></th>
                <?php endforeach; ?>
                <th class="w-20 px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="list bg-white divide-y divide-gray-200">

            <?php foreach ($data as $k => $row): ?>
            <tr class="odd:bg-gray-50 even:bg-gray-100 hover:bg-gray-200" id="item-<?= $row->id ?>" data-box-id="<?= $row->id ?>" data-box-name="<?= $dataBoxName ?? $row->name ?>">
                <?php foreach ($columns as $key => $column): ?>
                    <td class="<?= $key ?> text-gray-800 font-opensans">

                        <!--If is sortable, place draggable icon-->
                        <?php if (isset($sortable) && $sortable === true): ?>
                            <?php if ($column == $columns[array_key_first($columns)]): ?>
                                <i class="fas fa-grip-vertical handle ml-2 mr-4 cursor-move text-gray-400"></i>
                            <?php endif; ?>
                        <?php endif; ?>

                        <!--Display custom values according to type and result-->

                        <?php if (isset($column['type']) && $column['type'] == 'bool'): ?>

                            <?= $row->{$key} == true
                                ? "<small class='bg-green-100 text-green-600 px-1.5 py-0.5 rounded shadow'>" . $column['trueMessage'] . "</small>"
                                : "<small class='bg-red-100 text-red-600 px-1.5 py-0.5 rounded shadow'>" . $column['falseMessage'] . "</small>"
                            ?>
                        <?php else: ?>

                            <?= $row->{$key}; ?>

                        <?php endif; ?>
                    </td>
                <?php endforeach; ?>
                <td class="px-6 py-4 whitespace-nowrap text-right">
                    <a href="<?= $editLink ?><?= $row->id ?>" title="Modifier" class="btn edit edit-data py-3 rounded-md duration-300 bg-opacity-0 text-yellow-500 hover:text-gray-800">
                        <span>Modifier</span>
                        <i class="fas fa-highlighter"></i>
                    </a>
                    <a href="#!" title="Supprimer" class="btn delete delete-data py-3 rounded-md duration-300 bg-opacity-0 text-red-600 hover:text-gray-50">
                        <span>Supprimer</span>
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="flex items-center space-x-3 mt-2">
        <span class="text-sm text-gray-700">Pages</span>
        <ul class="pagination flex space-x-2 text-sm text-gray-700 font-bold"></ul>
    </div>

</div>

<?php if (isset($confirmationBox) && $confirmationBox->show === true): ?>
    <?= partial('confirmation_box',
        [
            'message' => $confirmationBox->message ?? "Voulez-vous vraiment supprimer",
            'title' => $confirmationBox->title ?? "Confirmation",
            'callbackUrl' => $confirmationBox->callbackUrl ?? null,
            'cancelCallbackUrl' => $confirmationBox->cancelCallbackUrl ?? null
        ]);
    ?>
<?php endif; ?>

<script>
    // Data
    let options = {
        valueNames: [
            <?php foreach ($columns as $key => $column): ?>
                '<?= $key; ?>',
            <?php endforeach; ?>
        ],
        page: 20,
        pagination: true
    };

    let resultList = new List('resultList', options)

    // Sortable
    <?php if (isset($sortable) && $sortable === true): ?>
        $(".list").sortable({
            cursor: "move",
            axis: "y",
            handle: ".handle",
            forceHelperSize: true,
            forcePlaceholderSize: true,
            revert: true,
            start: function(event, ui) {
                $(ui.item).removeClass("odd:bg-gray-50 even:bg-gray-100 hover:bg-gray-200");
                $(ui.item).addClass("bg-yellow-100");
            },
            stop: function(event, ui) {
                $(ui.item).removeClass("bg-yellow-100");
                $(ui.item).addClass("odd:bg-gray-50 even:bg-gray-100 hover:bg-gray-200");
                let data = $(this).sortable('serialize');
                $.ajax({
                    url: '<?= ADMIN_DIVING_LEVELS_SORT ?>',
                    type: 'POST',
                    cache: false,
                    data: data,
                    success: function (response) {
                        if (response == 1) {
                            location.reload();
                        }
                    }
                });
            }
        });
    <?php endif; ?>
</script>

<?php else: ?>

<p class="text-gray-600 italic">Aucune donnée à afficher</p>

<?php endif; ?>