<?php 

Class mailgun{

    public function org_smtp_mailgun_smtp_tools_page(){

        echo '<form method="post" action="options.php">';
            settings_fields( 'org_mailgun_smtp_register_setting');
            do_settings_sections( 'org_mailgun_smtp_section_settings');
            submit_button();
        echo '</form>';

     }


   public function org_mailgun_smtp_settings() {
        // Register a settings group
        register_setting('org_mailgun_smtp_register_setting', 'org_mailgun_smtp_option_name');

        // Add a section to the settings page
        add_settings_section('org_mailgun_smtp_sections', 'Mailgun SMTP', [$this,'mailgun_smtp_section_callback'], 'org_mailgun_smtp_section_settings');

        // Add a field to the section
        add_settings_field('mailgun_private_key', 'Private Api Key', [$this,'mailgun_private_key_callback'], 'org_mailgun_smtp_section_settings', 'org_mailgun_smtp_sections');

        add_settings_field('mailgun_smtp_domain', 'Domain Name', [$this,'mailgun_domain_name_callback'], 'org_mailgun_smtp_section_settings', 'org_mailgun_smtp_sections');

        add_settings_field('mailgun_smtp_region', 'Domain Name', [$this,'mailgun_smtp_region_callback'], 'org_mailgun_smtp_section_settings', 'org_mailgun_smtp_sections');
        
    }


    public function mailgun_smtp_section_callback() {
        echo 'Mailgun SMTP Configure';
    }

    public function mailgun_private_key_callback() {
        $options = get_option('org_mailgun_smtp_option_name');
        $value = isset($options['mailgun_private_key']) ? $options['mailgun_private_key'] : '';
        echo "<input type='password' name='org_mailgun_smtp_option_name[mailgun_private_key]' value='$value' />";
        echo "<p><i>Follow this link to get a Private API Key from Mailgun <a href='https://app.mailgun.com/app/account/security/api_keys' target='_blank' rel='noopener noreferrer'>Get a Private API Key</p></i>";
    }


    public function mailgun_domain_name_callback() {
        $options = get_option('org_mailgun_smtp_option_name');
        $value = isset($options['mailgun_smtp_domain']) ? $options['mailgun_smtp_domain'] : '';
        echo "<input type='url' name='org_mailgun_smtp_option_name[mailgun_smtp_domain]' value='$value' />";
        echo "<p><i>The username to log in to your mail server.</p></i>";
    }


    public function mailgun_smtp_region_callback() {
    $options = get_option('org_mailgun_smtp_option_name');
    $value = isset($options['mailgun_smtp_region']) ? $options['mailgun_smtp_region'] : '';

    // Define your encryption options
        $region_options = array(
            'us' => 'US',
            'ue' => 'UE',
        );

    foreach ($region_options as $option_value => $option_label) {
        $checked = checked($value, $option_value, false);
        echo "<label><input type='radio' name='org_mailgun_smtp_option_name[mailgun_smtp_region]' value='$option_value' $checked> $option_label</label><br>";
    }
    echo "<p><i>Define which endpoint you want to use for sending messages.<br> If you are operating under EU laws, you may be required to use EU region. <a href='https://www.mailgun.com/regions' rel='' target='_blank'>Mailgun.com. </p></i>";

   } 

 }  

?>