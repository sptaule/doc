<script>
    Notiflix.Confirm.init({className:"notiflix-confirm",width:"300px",zindex:8e3,position:"center",distance:"10px",backgroundColor:"#f8f8f8",borderRadius:"7px",backOverlay:!0,backOverlayColor:"rgba(0,0,0,0.65)",rtl:!1,fontFamily:"Quicksand",cssAnimation:!0,cssAnimationDuration:300,cssAnimationStyle:"zoom",plainText:!1,titleColor:"#bb0d0d",titleFontSize:"16px",titleMaxLength:56,messageColor:"#1e1e1e",messageFontSize:"14px",messageMaxLength:450,buttonsFontSize:"15px",buttonsMaxLength:42,okButtonColor:"#f8f8f8",okButtonBackground:"#32c682",cancelButtonColor:"#f8f8f8",cancelButtonBackground:"#a9a9a9"});
    Notiflix.Notify.init({width:"400px",position:"center-bottom",distance:"10px",opacity:1,borderRadius:"5px",rtl:!1,timeout:4500,messageMaxLength:450,backOverlay:!1,backOverlayColor:"rgba(0,0,0,0.5)",plainText:!1,showOnlyTheLastOne:!1,clickToClose:!0,pauseOnHover:!0,ID:"NotiflixNotify",className:"notiflix-notify",zindex:4001,useGoogleFont:!1,fontFamily:"Quicksand",fontSize:"15px",cssAnimation:!0,cssAnimationDuration:400,cssAnimationStyle:"fade",closeButton:!1,useIcon:!0,useFontAwesome:!1,fontAwesomeIconStyle:"basic",fontAwesomeIconSize:"34px",success:{background:"#32c682",textColor:"#fff",childClassName:"success",notiflixIconColor:"rgba(0,0,0,0.2)",fontAwesomeClassName:"fas fa-check-circle",fontAwesomeIconColor:"rgba(0,0,0,0.2)",backOverlayColor:"rgba(50,198,130,0.2)"},failure:{background:"#ff5549",textColor:"#fff",childClassName:"failure",notiflixIconColor:"rgba(0,0,0,0.2)",fontAwesomeClassName:"fas fa-times-circle",fontAwesomeIconColor:"rgba(0,0,0,0.2)",backOverlayColor:"rgba(255,85,73,0.2)"},warning:{background:"#eebf31",textColor:"#633E03",childClassName:"warning",notiflixIconColor:"rgba(0,0,0,0.2)",fontAwesomeClassName:"fas fa-exclamation-circle",fontAwesomeIconColor:"rgba(0,0,0,0.2)",backOverlayColor:"rgba(238,191,49,0.2)"},info:{background:"#26c0d3",textColor:"#fff",childClassName:"info",notiflixIconColor:"rgba(0,0,0,0.2)",fontAwesomeClassName:"fas fa-info-circle",fontAwesomeIconColor:"rgba(0,0,0,0.2)",backOverlayColor:"rgba(38,192,211,0.2)"}});

    $('.delete-btn').on('click', function () {

        let element = $(this).closest(".mix"); // Get element
        let data = []; // Create an array to store data elements
        data['id'] = $(element).attr('data-box-id'); // Get element id
        data['name'] = $(element).attr('data-box-name'); // Get element name


        Notiflix.Confirm.show(

            `<?= $title ?? 'Attention'; ?>`,
            `<?= $message; ?> <b>${data['name']}</b> ?<br><?= $subMessage ?? ''; ?>`,
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
                                $.when($(element).fadeOut(350))
                                .done(function() {
                                    Notiflix.Notify.success(`${data['name']} a été supprimé`);
                                });
                            }
                        }
                    });

                <?php endif; ?>
            },

            function cancelCallback() {

            },
        );
    });
</script>