<script>
    $('.delete-data').on('click', function () {

        let tr = $(this).closest('tr'); // Get element (row)
        let data = []; // Create an array to store data elements
        data['id'] = $(tr).attr('data-box-id'); // Get element id
        data['name'] = $(tr).attr('data-box-name'); // Get element name

        Notiflix.Confirm.show(

            `<?= $title; ?>`,
            `<?= $message; ?> ${data['name']} ?`,
            "<?= $okBtn ?? 'Oui'; ?>",
            "<?= $cancelBtn ?? 'Non'; ?>",

            function okCallback() {
                <?php if (isset($callbackUrl)): ?>

                    let callbackUrl = "<?= $callbackUrl; ?>";
                    callbackUrl = callbackUrl.replace("{id}", data['id']);
                    $.ajax({
                        url: callbackUrl,
                        type: 'POST',
                        cache: false,
                        data: {data: $(data).serializeArray()},
                        success: function (response) {
                            if (response == 1) {
                                $.when($(tr).fadeOut(500))
                                .done(function() {
                                    Notiflix.Notify.success(`${data['name']} a été supprimé`);
                                });
                            }
                        }
                    });

                <?php endif; ?>
            },

            function cancelCallback() {
                <?php if (isset($cancelCallbackUrl)): ?>


                <?php endif; ?>
            },
        );
    });
</script>