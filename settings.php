<?php
class MainSettingsPage2 { 
    
    public function __construct() {
        add_action('admin_menu', array($this, 'add_menu2'));
        add_action('admin_init', array($this, 'initialize_settings2'));
    }

    public function add_menu2() {
        add_menu_page(
            'Settings Page2',
            'Settings Page2',
            'manage_options',
            'settings-page-slug2',
            array($this, 'org_smtp_tools_page')
        );
    }

    public function initialize_settings2() {

          // Initialize settings for each tab
        include_once('sendlayer.php'); // Include tab1 class
        $sendlayer = new sendlayer();
        $sendlayer->org_sendlayer_smtp_settings();

        include_once('mailgun.php'); // Include tab1 class
        $mailgun = new mailgun();
        $mailgun->org_mailgun_smtp_settings();


    }

    public function org_smtp_tools_page(){
       ?>


        <div class="wrap">
            <h2>Settings Page</h2>
            <!-- Add tab navigation here -->
            <h2 class="nav-tab-wrapper">
                <a href="?page=settings-page-slug2&tab=tab1" class="nav-tab <?php echo $_GET['tab'] == 'tab1' ? 'nav-tab-active' : ''; ?>">Sendlayer</a>
                <a href="?page=settings-page-slug2&tab=tab2" class="nav-tab <?php echo $_GET['tab'] == 'tab2' ? 'nav-tab-active' : ''; ?>">Mailgun</a>
            </h2>
            <?php
            // Display the selected tab's content based on the 'tab' query parameter
            if (isset($_GET['tab'])) {
                $tab = sanitize_text_field($_GET['tab']);
                switch ($tab) {
                    case 'tab1':
                       
                        include_once('sendlayer.php');
                        $sendlayer = new sendlayer();
                        $sendlayer->org_smtp_sendlayer_smtp_tools_page();


                        break;
                    case 'tab2':
                       
                        include_once('mailgun.php');
                        $mailgun = new mailgun();
                        $mailgun->org_smtp_mailgun_smtp_tools_page();

                     break;
                }
            }
            ?>
        </div>          

   <?php 
    }
  } 

 new MainSettingsPage2();

?>