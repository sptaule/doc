<table style="width: 100%; font-family: ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif;"
       role="presentation">
    <tr>
        <td style="padding-left: 24px; padding-right: 24px; text-align: center; font-size: 12px; color: #4b5563;">
            <p style="margin: 0 0 4px;text-transform: uppercase;">Email envoyé par
                <a target="_blank" href="<?= PUBLIC_HOME ?>" class="hover-underline"
                   style="color: #3b82f6; text-decoration: none;">
                    <?= \App\Models\Club::getValue('club_name') ?>
                </a>
            </p>
            <p style="cursor: default;width:350px;margin: 0 auto;display: flex;align-items: center;justify-content: center;">
                <?php $facebookLink = \App\Models\Club::getValue('facebook_url'); ?>
                <?php if (!empty($facebookLink)): ?>
                    <a href="<?= $facebookLink ?>"
                       class="hover-underline"
                       style="color: #3b82f6; text-decoration: none;">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Facebook_f_logo_%282019%29.svg/240px-Facebook_f_logo_%282019%29.svg.png" width="24" height="24" alt="Facebook">
                    </a>
                <?php endif; ?>
                <?php $whatsappLink = \App\Models\Club::getValue('whatsapp_url'); ?>
                <?php if (!empty($whatsappLink)): ?>
                    <a href="<?= $whatsappLink ?>"
                       class="hover-underline"
                       style="color: #3b82f6; text-decoration: none;">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/239px-WhatsApp.svg.png" width="24" height="24" alt="WhatsApp">
                    </a>
                <?php endif; ?>
                <?php $twitterLink = \App\Models\Club::getValue('twitter_url'); ?>
                <?php if (!empty($twitterLink)): ?>
                    <a href="<?= $twitterLink ?>"
                       class="hover-underline"
                       style="color: #3b82f6; text-decoration: none;">
                        <img src="https://upload.wikimedia.org/wikipedia/fr/thumb/c/c8/Twitter_Bird.svg/295px-Twitter_Bird.svg.png" width="24" height="24" alt="Twitter">
                    </a>
                <?php endif; ?>
                <?php $youtubeLink = \App\Models\Club::getValue('youtube_url'); ?>
                <?php if (!empty($youtubeLink)): ?>
                    <a href="<?= $youtubeLink ?>"
                       class="hover-underline"
                       style="color: #3b82f6; text-decoration: none;">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/YouTube_social_red_squircle_%282017%29.svg/300px-YouTube_social_red_squircle_%282017%29.svg.png" width="24" height="24" alt="YouTube">
                    </a>
                <?php endif; ?>
                <?php $snapchatLink = \App\Models\Club::getValue('snapchat_url'); ?>
                <?php if (!empty($snapchatLink)): ?>
                    <a href="<?= $snapchatLink ?>"
                       class="hover-underline"
                       style="color: #3b82f6; text-decoration: none;">
                        <img src="https://upload.wikimedia.org/wikipedia/fr/a/ad/Logo-Snapchat.png" width="24" height="24" alt="Snapchat">
                    </a>
                <?php endif; ?>
                <?php $instagramLink = \App\Models\Club::getValue('instagram_url'); ?>
                <?php if (!empty($snapchatLink)): ?>
                    <a href="<?= $snapchatLink ?>"
                       class="hover-underline"
                       style="color: #3b82f6; text-decoration: none;">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/1024px-Instagram_icon.png" width="24" height="24" alt="Instagram">
                    </a>
                <?php endif; ?>
            </p>
        </td>
    </tr>
</table>