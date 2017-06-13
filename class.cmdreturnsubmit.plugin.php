<?php if (!defined('APPLICATION')) exit();

// Define the plugin:
$PluginInfo['CmdReturnSubmit'] = array(
	'Name' => 'CmdReturnSubmit',
	'Description' => 'Users can use cmd+return or ctrl+return for post submits.',
	'Version' => '0.9.2',
	'RequiredApplications' => array('Vanilla' => '2.1'),
	'RequiredPlugins' => FALSE,
	'RequiredTheme' => FALSE,
	'MobileFriendly' => FALSE,
	'HasLocale' => TRUE,
	'RegisterPermissions' => FALSE,
    'License'=>"GNU GPL2",
    'Author' => "sq-do",
    'Icon' => "'icon"
);

class CmdReturnSubmit extends Gdn_Plugin {
	
	public function DiscussionController_AfterFormButtons_Handler() {
		echo '<script type="text/javascript">';
		echo "$('#Form_Body').keydown(function(event){
			if((event.ctrlKey||event.metaKey) && ((event.keyCode == 0xA)||(event.keyCode == 0xD)))
				$('#Form_PostComment').click();
			})";
		echo '</script>';
	}
	
	public function PostController_AfterFormButtons_Handler() {
		echo '<script type="text/javascript">';
		echo "$('#Form_Body').keydown(function(event){
			if((event.ctrlKey||event.metaKey) && ((event.keyCode == 0xA)||(event.keyCode == 0xD)))
				$('#Form_Save').click();
				$('#Form_SaveComment').click();
			})";
		echo '</script>';
	}
	
	public function ProfileController_BeforeStatusForm_Handler() {
		echo '<script type="text/javascript">';
		echo "$(document).ready(function(){ $('#Form_Comment').keydown(function(event){
			if((event.ctrlKey||event.metaKey) && ((event.keyCode == 0xA)||(event.keyCode == 0xD)))
				$('#Form_Share').click();
			})})";
		echo '</script>';
	}
}