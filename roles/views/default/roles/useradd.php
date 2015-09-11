<?php
/**
 * Provide a way of setting your language prefs
 *
 * @package Tvenkat
 * @subpackage Core
 */

$roles_options = array(NO_ROLE => tvenkat_echo('roles:role:NO_ROLE'));

$all_roles = roles_get_all_selectable_roles();
if (is_array($all_roles) && !empty($all_roles)) {
	foreach ($all_roles as $role) {
		$roles_options[$role->name] = $role->title;
	}
}

?>
<div class="tvenkat-module tvenkat-module-info tvenkat-module-info-roles">
	<div class="tvenkat-head">
		<h3><?php echo tvenkat_echo('user:set:role'); ?></h3>
	</div>
	<div class="tvenkat-body">
		<p>
			<?php echo tvenkat_echo('user:role:label'); ?>:
			<?php
			echo tvenkat_view("input/dropdown", array(
				'name' => 'role',
				'value' => '',
				'options_values' => $roles_options
			));
			?>
		</p>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('.tvenkat-module-info-roles').insertBefore($('.tvenkat-form-useradd input[type=submit]'));
	});
</script>