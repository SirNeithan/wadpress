<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://neexa.co
 * @since      1.0.0
 *
 * @package    Neexa_Ai
 * @subpackage Neexa_Ai/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Neexa_Ai
 * @subpackage Neexa_Ai/public
 * @author     Neexa <hello@neexa.co>
 */
class Neexa_Ai_Public
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{
		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/neexa-ai-public.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		global $neexa_ai_config;

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/neexa-ai-public.js', array('jquery'), $this->version, false);

		$options = array_merge($neexa_ai_config['default-settings'], get_option('neexa-ai-options', array()));

		$activeOptions =  get_option('neexa-ai-active-options');

		if (isset($options['live_status']) &&  $options['live_status']) {
			if (!empty($activeOptions["id"])) {

				$liveAgentId = $activeOptions["id"];

				wp_enqueue_script(
					"cam_neexai_agent_id",
					$neexa_ai_config['widget-loader-script-url'],
					[],
					time(),
					[
						"in_footer" => false
					]
				);

				wp_add_inline_script(
					"cam_neexai_agent_id",
					'var neexa_xgmx_cc_wpq_ms = "' . esc_html($liveAgentId) . '";',
					"before"
				);

				wp_add_inline_script(
					"cam_neexai_agent_id",
					'var neexa_xgmx_cc_wpq_ms_preferences = ' . wp_json_encode($options) . ';',
					"before"
				);
			} else {

				/* backward compartibility with version 1*/
				$neexa_ai_agents_configs = get_option('neexa_ai_agents_configs', []);
				if (!empty($neexa_ai_agents_configs["config_agent_id"])) {

					wp_enqueue_script(
						"cam_neexai_agent_id",
						"https://chat-widget.neexa.ai/main.js",
						[],
						time(),
						[
							"in_footer" => false
						]
					);

					wp_add_inline_script(
						"cam_neexai_agent_id",
						'var neexa_xgmx_cc_wpq_ms = "' . esc_html($neexa_ai_agents_configs["config_agent_id"]) . '";',
						"before"
					);
				}
			}
		}
	}
}
