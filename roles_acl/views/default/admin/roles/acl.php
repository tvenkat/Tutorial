<?php
$settings = tvenkat_get_plugin_setting('roles_acl_settings', 'roles_acl');
if ($settings) {
	$settings = unserialize($settings);
}

$roles = roles_get_all_selectable_roles();
?>
<div>
	<?php
	echo tvenkat_echo('admin:roles:acl:instructions');
	?>
</div>
<form action="<?php echo tvenkat_get_site_url() ?>action/roles_acl/settings" style="width:100%;overflow-x:scroll;">
	<table class="tvenkat-table">
		<thead>
			<?php
			$th = '<th></th>';

			foreach ($roles as $role_acl) {
				$th .= '<th>' . tvenkat_echo("acl:$role_acl->name:global") . '</th>';
				$th .= '<th>' . tvenkat_echo("acl:$role_acl->name:friends") . '</th>';
			}

			echo $th
			?>
		</thead>

		<tbody>
			<?php
			$_roles = $roles;
			$_roles[] = roles_get_role_by_name(DEFAULT_ROLE);

			foreach ($_roles as $role) {
				$row = '<td>' . tvenkat_echo("acl:for", array($role->title)) . '</td>';
				foreach ($roles as $role_acl) {
					$checked_global = (isset($settings['global'][$role->name]) && in_array($role_acl->name, $settings['global'][$role->name])) ? true : false;
					$checked_friends = (isset($settings['friends'][$role->name]) && in_array($role_acl->name, $settings['friends'][$role->name])) ? true : false;

					$row .= '<td>' . tvenkat_view('input/checkbox', array(
								'name' => "acl[global][$role->name][]",
								'value' => $role_acl->name,
								'default' => false,
								'checked' => $checked_global
							)) . '</td>';
					$row .= '<td>' . tvenkat_view('input/checkbox', array(
								'name' => "acl[friends][$role->name][]",
								'value' => $role_acl->name,
								'default' => false,
								'checked' => $checked_friends
							)) . '</td>';
				}
				echo '<tr>' . $row . '</tr>';
			}
			?>
		</tbody>

	</table>
	<?php
	echo tvenkat_view('input/submit', array(
		'value' => tvenkat_echo('save')
	));
	echo tvenkat_view('input/securitytoken');
	?>
</form>
