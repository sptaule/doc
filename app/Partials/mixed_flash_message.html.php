<?php if ($flash = get_flash()): ?>
    <script>
        Notiflix.Notify.init({
            width: '400px',
            position: 'center-bottom', // 'right-top' - 'right-bottom' - 'left-top' - 'left-bottom' && v2.2.0 and the next versions => 'center-top' - 'center-bottom' - 'center-center'
            distance: '10px',
            opacity: 1,
            borderRadius: '5px',
            rtl: false,
            timeout: 4500,
            messageMaxLength: 250,
            backOverlay: false,
            backOverlayColor: 'rgba(0,0,0,0.5)',
            plainText: false,
            showOnlyTheLastOne: false,
            clickToClose: true,
            pauseOnHover: true,
            ID: 'NotiflixNotify',
            className: 'notiflix-notify',
            zindex: 4001,
            useGoogleFont: false, // v2.2.0 and the next versions => has been changed as "false"
            fontFamily: 'Quicksand',
            fontSize: '15px',
            cssAnimation: true,
            cssAnimationDuration: 400,
            cssAnimationStyle: 'fade', // 'fade' - 'zoom' - 'from-right' - 'from-top' - 'from-bottom' - 'from-left'
            closeButton: false,
            useIcon: true,
            useFontAwesome: false,
            fontAwesomeIconStyle: 'basic', // 'basic' - 'shadow'
            fontAwesomeIconSize: '34px',
            success: {
                background: '#32c682',
                textColor: '#fff',
                childClassName: 'success',
                notiflixIconColor: 'rgba(0,0,0,0.2)',
                fontAwesomeClassName: 'fas fa-check-circle',
                fontAwesomeIconColor: 'rgba(0,0,0,0.2)',
                backOverlayColor: 'rgba(50,198,130,0.2)', // v2.2.0 and the next versions
            },
            failure: {
                background: '#ff5549',
                textColor: '#fff',
                childClassName: 'failure',
                notiflixIconColor: 'rgba(0,0,0,0.2)',
                fontAwesomeClassName: 'fas fa-times-circle',
                fontAwesomeIconColor: 'rgba(0,0,0,0.2)',
                backOverlayColor: 'rgba(255,85,73,0.2)', // v2.2.0 and the next versions
            },
            warning: {
                background: '#eebf31',
                textColor: '#633E03',
                childClassName: 'warning',
                notiflixIconColor: 'rgba(0,0,0,0.2)',
                fontAwesomeClassName: 'fas fa-exclamation-circle',
                fontAwesomeIconColor: 'rgba(0,0,0,0.2)',
                backOverlayColor: 'rgba(238,191,49,0.2)', // v2.2.0 and the next versions
            },
            info: {
                background: '#26c0d3',
                textColor: '#fff',
                childClassName: 'info',
                notiflixIconColor: 'rgba(0,0,0,0.2)',
                fontAwesomeClassName: 'fas fa-info-circle',
                fontAwesomeIconColor: 'rgba(0,0,0,0.2)',
                backOverlayColor: 'rgba(38,192,211,0.2)', // v2.2.0 and the next versions
            }
        });

        <?php if ($flash['type'] === 'success'): ?>
            Notiflix.Notify.success("<?= $flash['message']; ?>");
        <?php elseif ($flash['type'] == 'warning'): ?>
            Notiflix.Notify.warning("<?= $flash['message']; ?>");
        <?php elseif ($flash['type'] == 'danger'): ?>
            Notiflix.Notify.failure("<?= $flash['message']; ?>");
        <?php endif; ?>

        Notiflix.Confirm.init({
            className: 'notiflix-confirm',
            width: '300px',
            zindex: 8000,
            position: 'center', // 'center' - 'center-top' - 'center-bottom' - 'right-top' - 'right-center' - 'right-bottom' - 'left-top' - 'left-center' - 'left-bottom'
            distance: '10px',
            backgroundColor: '#f8f8f8',
            borderRadius: '25px',
            backOverlay: true,
            backOverlayColor: 'rgba(0,0,0,0.5)',
            rtl: false,
            fontFamily: 'Quicksand',
            cssAnimation: true,
            cssAnimationDuration: 300,
            cssAnimationStyle: 'fade', // 'zoom' - 'fade'
            plainText: false,
            titleColor: '#bb0d0d',
            titleFontSize: '16px',
            titleMaxLength: 34,
            messageColor: '#1e1e1e',
            messageFontSize: '14px',
            messageMaxLength: 110,
            buttonsFontSize: '15px',
            buttonsMaxLength: 34,
            okButtonColor: '#f8f8f8',
            okButtonBackground: '#32c682',
            cancelButtonColor: '#f8f8f8',
            cancelButtonBackground: '#a9a9a9',
        });
    </script>
<?php endif ?>