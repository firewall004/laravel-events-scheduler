<?php

/**
 * This configuration will be read and overlaid on top of the
 * default configuration. Command line arguments will be applied
 * after this file is read.
 */

return [

	'exclude_analysis_directory_list' => [
		'vendor'
	],
	'directory_list' => [
		'app',
		'bootstrap',
		'config',
		'database',
		'public',
		'routes',
		'tests',
		'vendor'
	],
	'backward_compatibility_checks' => false,
	'unused_variable_detection' => true
];
