<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
    <meta http-equiv="Content-Type" content="text/html charset=UTF-8">
    <meta name="color-scheme" content="light dark">
    <meta name="supported-color-schemes" content="light dark">
    <title>Validation du compte</title>
    <style>:root{color-scheme:light dark;supported-color-schemes:light dark}.hover-bg-blue-600:hover{background-color:#2563eb !important}.hover-underline:hover{text-decoration:underline}@media (max-width:600px){.sm-w-full{width:100%}.sm-py-32{padding-top:32px;padding-bottom:32px}.sm-px-24{padding-left:24px;padding-right:24px}.sm-leading-32{line-height:32px}}@media (prefers-color-scheme:dark){.dark-mode-bg-gray-999{background-color:#1b1c1e}.dark-mode-bg-gray-989{background-color:#2d2d2d}.dark-mode-text-gray-979{color:#a9a9a9}.dark-mode-text-white{color:#fff}}.token-link:hover{text-decoration: underline !important;}</style>
</head>
<body class="dark-mode-bg-gray-999"
      style="margin: 0; width: 100%; padding: 0; word-break: break-word; -webkit-font-smoothing: antialiased; background-color: #f3f4f6;">
    <div role="article" aria-roledescription="email" aria-label="<?= \App\Models\Club::getValue('club_name') ?> - Validez votre compte" lang="fr">
        <table class="sm-w-full" style="width: 600px;margin: 0 auto;display: flex;align-items: center;justify-content: center;" role="presentation">
            <tr>
                <td class="sm-py-32 sm-px-24" style="padding: 48px; text-align: center;">
                    <a href="<?= PUBLIC_HOME ?>">
                        <img
                            src="<?= CLUB_LOGO ?>" width="175" alt="Logo du club"
                            style="max-width: 100%; vertical-align: middle; line-height: 100%; border: 0;">
                    </a>
                </td>
            </tr>
        </table>
        <table style="width: 100%; font-family: ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif;"
               role="presentation">
            <tr>
                <td class="dark-mode-bg-gray-999" style="background-color: #f3f4f6;">
                    <table class="sm-w-full" style="width: 600px;margin: 0 auto;display: flex;align-items: center;justify-content: center;" role="presentation">
                        <tr>
                            <td class="sm-px-24">
                                <table style="margin-bottom: 48px; width: 100%;"
                                       role="presentation">
                                    <tr>
                                        <td class="dark-mode-bg-gray-989 dark-mode-text-gray-979 sm-px-24"
                                            style="background-color: #ffffff; padding: 48px; text-align: left; font-size: 16px; line-height: 24px; color: #1f2937;">
                                            <p class="sm-leading-32 dark-mode-text-white"
                                               style="margin: 0 0 36px;font-family: ui-serif, Georgia, Cambria, 'Times New Roman', Times, serif; font-size: 24px; font-weight: 600; color: #000000;">
                                                Bienvenue au club, vous y êtes presque !
                                            </p>
                                            <p style="margin: 0 0 24px;">
                                                Cliquez sur le bouton ci-dessous pour confirmer votre adresse email et ainsi activer votre compte.
                                            </p>
                                            <a href="<?= $tokenLink ?>" class="hover-bg-blue-600"
                                               style="display: inline-block; background-color: #3b82f6; padding: 16px 24px;text-align: center; font-size: 16px; font-weight: 600; text-transform: uppercase; color: #ffffff; text-decoration: none;border-radius: 5px;">
                                                <span style="mso-text-raise: 16px">
                                                    Confirmer mon adresse email
                                                </span>
                                            </a>
                                            <table style="width: 100%;" role="presentation">
                                                <tr>
                                                    <td style="padding-top: 32px; padding-bottom: 32px;">
                                                        <hr style="border-bottom-width: 0; border-color: #f3f4f6;">
                                                    </td>
                                                </tr>
                                            </table>
                                            <p style="margin: 0 0 16px;color: #6b7280;">
                                                Si le bouton ne fonctionne pas, copiez et collez ce lien dans votre navigateur :
                                                <a class="token-link" href="<?= $tokenLink ?>" style="color: #7a92c7;font-size: 12px;">
                                                    <?= $_SERVER['HTTP_HOST'] . '/' . $tokenLink ?>
                                                </a>
                                            </p>
                                            <p style="margin: 0 0 16px;color: #6b7280;">
                                                Si vous n'êtes pas à l'origine de cette requête, vous pouvez simplement ignorer cet email.
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <?= partialMail('includes/footer') ?>
    </div>
</body>
</html>