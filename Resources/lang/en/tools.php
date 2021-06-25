<?php 

return [
	'cache' => [
		'title' => 'Clear Cache Command', 
		'subtitle' => 'Please select one of the commands that you want to execute.', 

		'command' => [
			'all' => [
				'label' => 'Clear all caching: database caching, static blocks, etc.', 
				'desc' => 'Run this command to execute all of these command below (except logs).', 
				'button' => 'Clear all cache'
			],
			'view' => [
				'label' => 'Clear compiled views to make views up to date.', 
				'desc' => 'php artisan view:clear', 
				'button' => 'Refresh compiled views'
			],
			'config' => [
				'label' => 'You might need to refresh the config caching when you change something on production environment.', 
				'desc' => 'php artisan config:clear', 
				'button' => 'Clear config cache'
			],
			'route' => [
				'label' => 'Clear cache routing.', 
				'desc' => 'php artisan route:clear', 
				'button' => 'Clear route cache'
			],
			'log' => [
				'label' => 'Clear system log files', 
				'desc' => 'Remove all logs file from storage directory', 
				'button' => 'Clear log files'
			]
		],
	], 
];