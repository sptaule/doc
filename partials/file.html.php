<style>
    .image-uploader{background:#d3d3d2}.image-uploader:hover{background:#e3e3e3}.upload-text{color: #33354b}
</style>

<div class="img-input flex flex-col justify-center items-center <?= $size ?? '' ?>">
    <label class="w-full text-left px-1 text-sm text-gray-600" for="img-input"><?= $label ?? '' ?></label>
    <div class="w-full <?= $name; ?> cursor-pointer transition py-3 px-3 hover:bg-gray-100"></div>
</div>
<?= partial('form_error', ['name' => $name]) ?>

<script>

    // Define preloaded images in preloader if any
    <?php if (isset($images) && !empty($images)): ?>

        let preloaded = [<?= $images; ?>];
        let imagesInputName = 'photos';
        let preloadedInputName = 'old';

        $('.<?= $name; ?>').imageUploader({
            extensions: ['.jpg', '.jpeg', '.png'],
            mimes: ['image/jpeg', 'image/png'],
            preloaded: preloaded,
            imagesInputName: imagesInputName,
            preloadedInputName: preloadedInputName,
            maxFiles: <?= $maxFiles ?? 1; ?>,
        });

    // Else define blank uploader
    <?php else: ?>

        $('.<?= $name; ?>').imageUploader({
            extensions: ['.jpg', '.jpeg', '.png'],
            mimes: ['image/jpeg', 'image/png'],
            maxFiles: <?= $maxFiles ?? 1; ?>,
        });

    <?php endif; ?>

    

    $(".delete-image").each(function() {
        $(this).on('click', function() {
            let imgBaseLink = $(this).prev().attr('src');
            $.ajax({
                url: "/admin/ajax/delete_image.php",
                type: "POST",
                cache: false,
                data:{
                    imgBaseLink: imgBaseLink
                },
                success: function(response) {
                    if (response == 1) {
                        Notiflix.Notify.success('Image supprimée');
                    }
                }
            });
        });
    });

</script>