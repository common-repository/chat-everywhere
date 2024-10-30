<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://codingfix.com
 * @since      1.0.0
 *
 * @package    Chat_Everywhere
 * @subpackage Chat_Everywhere/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div id="cfxchat-general" class="wrap">
    <h2>Chat Everywhere settings</h2>
    <?php
    if (
        isset($_GET['message'])
        && $_GET['message'] == '1'
    ) { ?>
        <div id='message' class='updated fade'>
            <p><strong>Settings
                    Saved</strong></p>
        </div>
    <?php } ?>

    <br />
    <br />
    <form method="post" action="admin-post.php" class="<?php echo $hidden ? 'hidden' : '';  ?>">
        <input type="hidden" name="action" value="save_cfxchat_options" />
        <!-- Adding security through hidden referrer field -->
        <?php wp_nonce_field('cfxchat'); ?>
        <div class="postbox">
            <div class="settingsbox">
                <?php
                $options = get_option('cfxchat_options');
                $whatsapp_class_name = isset($options['whatsapp_class_name']) ? $options['whatsapp_class_name'] : 'whatsapp_everywhere';
                $telegram_class_name = isset($options['telegram_class_name']) ? $options['telegram_class_name'] : 'telegram_everywhere';
                $telegram_user_name = isset($options['telegram_user_name']) ? $options['telegram_user_name'] : '';
                $phone_number = isset($options['phone_number']) ? $options['phone_number'] : '';
                $message_text = isset($options['message_text']) ? $options['message_text'] : '';
                ?>
                <h2>WhatsApp</h2>
                <h3>Triggering class</h3>
                <label for="whatsapp_class_name">By default, Whatsapp will be activated by clicking on an element with class "whatsapp_everywhere", but here you can set your own activating class name.</label>
                <br>
                <br>
                <input type="text" id="whatsapp_class_name" name="whatsapp_class_name" placeholder="whatsapp_class_name" value="<?php echo $whatsapp_class_name ?>" />
                <h3>Phone number</h3>
                <label for="phone_number">Put here your Whatsapp number: all messages will be sent to this number: start with the international prefix and use only digits.</label>
                <br>
                <br>
                <input type="text" id="phone_number" name="phone_number" placeholder="00123456789" value="<?php echo $phone_number ?>" />
                <h3>Message</h3>
                <label for="message_text">This is the default message your visitors will can use to contact you.</label>
                <br>
                <br>
                <input type="text" id="message_text" name="message_text" placeholder="Type message here" value="<?php echo $message_text ?>" />
                <br>
                <br>
                <br>
                <hr>
                <br>
                <h2>Telegram</h2>
                <h3>Triggering class</h3>
                <label for="Telegram_class_name">By default, Telegram will be activated by clicking on an element with class "telegram_everywhere", but here you can set your own activating class name.</label>
                <br>
                <br>
                <input type="text" id="Telegram_class_name" name="Telegram_class_name" placeholder="Telegram_class_name" value="<?php echo $telegram_class_name ?>" />
                <h3>Username</h3>
                <label for="telegram_user_name">Put here your Telegram username: all messages will be sent to this Telegram account.</label>
                <br>
                <br>
                <input type="text" id="telegram_user_name" name="telegram_user_name" placeholder="Telegram username" value="<?php echo $telegram_user_name ?>" />
                <br>
                <br>
            </div>
        </div>
        <br />
        <br />

        <br />
        <br />
        <input type="submit" value="Save changes" class="button-primary" />
    </form>
</div>