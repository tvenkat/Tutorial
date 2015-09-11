<?php

echo '<div>';
echo '<label>' . tvenkat_echo('roles:settings:automatic_reset') . '</label>';
echo '<div class="tvenkat-text-help">' . tvenkat_echo('roles:settings:automatic_reset:help') . '</div>';
echo tvenkat_view('input/dropdown', array(
	'name' => 'params[automatic_reset]',
	'value' => $vars['entity']->automatic_reset,
	'options_values' => array(
		0 => tvenkat_echo('option:no'),
		1 => tvenkat_echo('option:yes')
	)
));
echo '</div>';
?>






