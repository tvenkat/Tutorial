<?php
/**
 * Provide a way of setting your language prefs
 *
 * @package Tvenkat
 * @subpackage Core
 */

$user = tvenkat_get_page_owner_entity();
$current_role = roles_get_role($user);
if ($current_role->isReservedRole()) {
	$current_role_name = NO_ROLE;
} else {
	$current_role_name = $current_role->name;
}

$roles_options = array(NO_ROLE => tvenkat_echo('roles:role:NO_ROLE'));

$all_roles = roles_get_all_selectable_roles();
if (is_array($all_roles) && !empty($all_roles)) {
	foreach ($all_roles as $role) {
		$roles_options[$role->name] = $role->title;
	}
}

if (tvenkat_instanceof($user, 'user')) {
?>
<div class="tvenkat-module tvenkat-module-info">
	<div class="tvenkat-head">
		<h3><?php echo tvenkat_echo('user:set:role'); ?></h3>
	</div>
	<div class="tvenkat-body">
		<p>
			<?php echo tvenkat_echo('user:role:label'); ?>:
			<?php
			echo tvenkat_view("input/dropdown", array(
				'name' => 'role',
				'value' => $current_role_name,
				'options_values' => $roles_options
			));
			?>
		</p>
	</div>
</div>
<?php
}