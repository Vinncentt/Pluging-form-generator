<?php
/*
Plugin Name: G-FORM
Plugin URI: 
Description: G-FORM is a plugin that makes you easily create a form
Author: SIF EDDINE
Author URI: 
Version: 1.0
*/
add_action("admin_menu", "addMenu");
function addMenu()
{
  add_menu_page("Form creator", "Form creator", 4, "Form_creator", "formMenu" );
}

function fieldsTable()
{
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $tablename = 'fields';
    $sql = "CREATE TABLE $wpdb->base_prefix$tablename (
        id INT,
        fName BOOLEAN,
        lName BOOLEAN,
        email BOOLEAN,
        subject BOOLEAN,
        message BOOLEAN
        ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    maybe_create_table($wpdb->base_prefix . $tablename, $sql);
}

function insertFields()
{
    global $wpdb;
    $wpdb->insert(
        $wpdb->base_prefix.'fields',
        [
            'id' => 1,
            'fname' => true,
            'lname' => true,
            'email' => true,
            'subject' => true,
            'message' => true
        ]
    );
}


register_activation_hook(__FILE__, 'fieldsTable');

register_activation_hook(__FILE__, 'insertFields');

function getFields()
{
    global $wpdb;
    $tablename = 'fields';
    $fields = $wpdb->get_row("SELECT * FROM $wpdb->base_prefix$tablename WHERE id = 1;");
    return $fields;
}

function formMenu()
{
    $fields = getFields();
    ?>
    <div class="content">    
        <form method="post" action="">
            <div class="input-content">
                <input type="checkbox" id="fName" name="fName" value="true" <?php echo $fields->fName == 1 ? 'checked' : '' ?>>
                <label for="">First Name</label>
            </div>
            <div class="input-content">
                <input type="checkbox" id="lName" name="lName" value="true" <?php echo $fields->lName == 1 ? 'checked' : '' ?>>
                <label for="">Last Name</label>
            </div>
            <div class="input-content">
                <input type="checkbox" id="email" name="email" value="true" <?php echo $fields->email == 1 ? 'checked' : '' ?>>
                <label for="">Email</label>
            </div>
            <div class="input-content">
                <input type="checkbox" id="subj" name="subj" value="true" <?php echo $fields->subject == 1 ? 'checked' : '' ?>>
                <label for="">Subject</label>
            </div>
            <div class="input-content">
                <input type="checkbox" id="msg" name="msg" value="true" <?php echo $fields->message == 1 ? 'checked' : '' ?>>
                <label for="">Message</label>
            </div>
            <div class="input-content">
                <button type="submit" name="formFields">Create</button>
            </div>
        </form>
    </div>
    <?php
    echo 'shortcod : ' . '[go_contact]';
}

if (isset($_POST['formFields'])) {
    $fName = filter_var($_POST['fName'] ?? false, FILTER_VALIDATE_BOOLEAN) ;
    $lName = filter_var($_POST['lName'] ?? false, FILTER_VALIDATE_BOOLEAN) ;
    $email = filter_var($_POST['email'] ?? false, FILTER_VALIDATE_BOOLEAN) ;
    $subject = filter_var($_POST['subj'] ?? false, FILTER_VALIDATE_BOOLEAN) ;
    $message = filter_var($_POST['msg'] ?? false, FILTER_VALIDATE_BOOLEAN) ;

    global $wpdb;
    $wpdb->update(
        $wpdb->base_prefix.'fields',
        [
            'fName' => $fName,
            'lName' => $lName,
            'email' => $email,
            'subject' => $subject,
            'message' => $message
        ],
        ['id' => 1]
    );
}

function formCode()
{
    getFields();
    echo '<form>';

    if (getFields()->fName) {

        echo 'Your Name (required) <br />';
        echo '<input type="text" name="fName" size="40" /><br>';
    }
    if (getFields()->lName) {

        echo 'Your Name (required) <br />';
        echo '<input type="text" name="lName" size="40" /><br>';
    }
    if (getFields()->email) {

        echo 'Your Email (required) <br />';
        echo '<input type="email" name="email" size="40" /><br>';
    }
    if (getFields()->subject) {

        echo 'Subject (required) <br />';
        echo '<input type="text" name="subject" size="40" /><br>';
    }
    if (getFields()->message) {

        echo 'Your Message (required) <br />';
        echo '<textarea rows="10" cols="35" name="message"></textarea><br>';
    }

    echo '<p><input type="submit" name="send" value="Send"/></p>';
    echo '</form>';
}


function cf_shortcode()
{
    formCode();

    return ob_get_clean();
}

add_shortcode('go_contact', 'cf_shortcode');
