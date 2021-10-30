<link rel="stylesheet" href="/assets/trumbowyg/ui/trumbowyg.min.css">
<script src="/assets/trumbowyg/trumbowyg.min.js"></script>

<div class="<?= $size ?? '' ?>">
    <textarea placeholder="Contenu de la page..." name="<?= $name ?>" id="<?= $name ?>" cols="30" rows="10" style="min-height:50vh;"><?= $content ?? null ?></textarea>
    <?= partial('form_error', ['name' => $name]) ?>
</div>

<script>
    $('#<?= $name; ?>').trumbowyg({
        lang: 'fr',
        resetCss: true,
        removeformatPasted: true,
        minimalLinks: true,
        svgPath: '/assets/trumbowyg/ui/icons.svg',
        tagsToRemove: ['script', 'link'],
        tagClasses: {
            h1: 'text-scuba-green text-2xl',
            blockquote: 'bg-green-100 rounded-xl border',
        },
        btns: [
            ['historyUndo','historyRedo'],
            ['p', 'h1', 'h2', 'h3', 'h4', 'fontsize'],
            ['strong', 'em', 'underline'],
            ['foreColor', 'backColor', 'emoji'],
            ['createLink', 'unlink'],
            ['upload', 'giphy', 'noembed'],
            ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
            ['unorderedList', 'orderedList'],
            ['mention'],
            ['horizontalRule'],
            ['removeformat'],
            ['fullscreen']
        ],
        plugins: {
            giphy: {
                apiKey: 'Z1RkHiV6HPDElDu5eOIxQktiMJ1rTktt'
            },
            resizimg: {
                minSize: 64,
                step: 16,
            },
            upload: {
                lang: 'fr',
                serverPath: "<?= EDITOR_IMAGE_UPLOAD; ?>",
                urlPropertyName: 'file',
            },
            fontsize: {
                allowCustomSize: false
            },
            colors: {
                colorList: [
                    '55DDFF', '003380', '2CA089', 'c90076', 'cc0000', 'ff009a', 'ff6c6c', '6aa84f', 'bf9000', '0b79f9', 'ffffff', '000000'
                ]
            },
            mention: {
                source: [
                    {login: 'jdoe', name: 'John Doe (The Jean-Claude Van Damme\'s intern)'},
                    {login: 'lgaga', name: 'Lady Gaga'},
                    {login: 'jcvd', name: 'Jean-Claude Van Damme'},
                    {login: 'nminaj', name: 'Nicki Minaj'},
                    {login: 'mshinoda', name: 'Mike Shinoda'},
                    {login: 'epiaf', name: 'Edith Piaf'},
                    {login: 'kwest', name: 'Kanye West'},
                    {login: 'jbalasko', name: 'Josiane Balasko'},
                    {login: 'jcesar', name: 'Julius Cesarius'},
                    {login: 'mlisa', name: 'Mona Lisa'},
                    {login: 'mjackson', name: 'Mickael Jackson'},
                    {login: 'fflament', name: 'Flavie Flament'},
                ],
                formatDropdownItem: function (item) {
                    return item.name + ' (@' + item.login + ')';
                }
            }
        }
    });
    $.trumbowyg.svgAbsoluteUsePath = true;
</script>