<?php 

class sendlayer{


 public function org_smtp_sendlayer_smtp_tools_page(){

        echo '<form method="post" action="options.php">';
            settings_fields( 'org_sendlayer_smtp_register_setting');
            do_settings_sections( 'org_sendlayer_smtp_section_settings');
            submit_button();
        echo '</form>';

     }


   public function org_sendlayer_smtp_settings() {
        // Register a settings group
        register_setting('org_sendlayer_smtp_register_setting', 'org_sendlayer_smtp_option_name');

        // Add a section to the settings page
        add_settings_section('org_sendlayer_smtp_sections', 'Sendlayer SMTP', [$this,'sendlayer_smtp_section_callback'], 'org_sendlayer_smtp_section_settings');

        // Add a field to the section
        add_settings_field('sendlayer_api_key', 'Api Key', [$this,'sendlayer_api_key_callback'], 'org_sendlayer_smtp_section_settings', 'org_sendlayer_smtp_sections');    
        
    }


    public function sendlayer_smtp_section_callback() {
        echo 'SendLayer is our #1 recommended mailer. It offers affordable pricing and is easy to set up, which makes it an excellent option for WordPress sites. With SendLayer, your domain will be authenticated so all your outgoing emails reach your customers’ inboxes. Detailed documentation will walk you through the entire process, start to finish. When you sign up for a free trial, you can send your first emails at no charge.';
    }

    public function sendlayer_api_key_callback() {
        $options = get_option('org_sendlayer_smtp_option_name');
        $value = isset($options['sendlayer_api_key']) ? $options['sendlayer_api_key'] : '';
        echo "<input type='password' name='org_sendlayer_smtp_option_name[sendlayer_api_key]' placeholder='enter sendlayer Api' value='$value' />";
        echo "<p><i>Follow this link to get an API Key from SendLayer: 
              <a href='https://app.sendlayer.com/settings/api/?utm_source=easywpsmtpplugin&utm_medium=WordPress&utm_campaign=liteplugin&utm_content=Plugin%20Settings%20-%20Get%20API%20Key'>Get API Key.</p></i>";
    }

 }
?>