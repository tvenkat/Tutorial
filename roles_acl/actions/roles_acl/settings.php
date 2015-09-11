<?php

$acls = get_input('acl', false);

if (!$acls) {
	register_error(tvenkat_echo('admin:roles:acl:emptyselection'));
	forward(REFERER);
}

$new_settings = serialize($acls);

if (tvenkat_set_plugin_setting('roles_acl_settings', $new_settings, 'roles_acl')) {
	system_message(tvenkat_echo('admin:roles:acl:settingssaved'));
} else {
	register_error(tvenkat_echo('admin:roles:acl:unknownerror'));
}

forward(REFERER);