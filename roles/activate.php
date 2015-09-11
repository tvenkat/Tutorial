<?php 

if (get_subtype_id('object', 'role')) {
	update_subtype('object', 'role', 'TvenkatRole');
} else {
	add_subtype('object', 'role', 'TvenkatRole');
}

tvenkat_register_library('roles', tvenkat_get_plugins_path() . 'roles/lib/roles.php');
tvenkat_register_library('roles_config', tvenkat_get_plugins_path() . 'roles/lib/config.php');

tvenkat_load_library('roles');
tvenkat_load_library('roles_config');

// Create the role objects from the configuration arrays
$roles_array = tvenkat_trigger_plugin_hook('roles:config', 'role', array(), null);
roles_create_from_config($roles_array);

if (is_null(tvenkat_get_plugin_setting('automatic_reset', 'roles'))) {
	tvenkat_set_plugin_setting('automatic_reset', true, 'roles');
}
?>