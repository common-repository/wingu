<?php

declare(strict_types=1);

namespace Wingu\Plugin\Wordpress;

use Http\Client\Curl\Client;
use Http\Message\MessageFactory\GuzzleMessageFactory;
use Wingu\Engine\SDK\Api\Configuration;
use Wingu\Engine\SDK\Api\WinguApi;
use Wingu\Engine\SDK\Hydrator\SymfonySerializerHydrator;

class Wingu
{
    /** @var self */
    private static $instance;

    const GLOBAL_KEY_API_KEY = 'wingu_setting_api_key';
    const GLOBAL_KEY_API_KEY_IS_VALID = 'wingu_setting_api_key_is_valid';
    const GLOBAL_KEY_DISPLAY_PREFERENCE = 'wingu_setting_display_preference';
    const GLOBAL_KEY_LINK_BACK = 'wingu_setting_link_back';
    const GLOBAL_KEY_LINK_BACK_TEXT = 'wingu_setting_link_back_text';

    const POST_KEY_DISPLAY_PREFERENCE = '_wingu_post_display_preference';
    const POST_KEY_LINK_BACK = '_wingu_post_link_back';
    const POST_KEY_CONTENT = '_wingu_post_content';
    const POST_KEY_COMPONENT = '_wingu_post_component';

    /** @var WinguLoader */
    protected $loader;

    /** @var string */
    protected static $basename;

    /** @var string */
    protected static $name;

    /** @var string */
    protected static $version;

    /** @var WinguApi */
    public static $API;

    /** @var string */
    public static $API_URL;

    public function __construct()
    {
        if (\defined('WINGU_VERSION')) {
            $this::$version = WINGU_VERSION;
        } else {
            $this::$version = '1.0.0';
        }

        $this::$basename = plugin_basename(__FILE__);
        $plugin_basename = explode('/', $this::$basename);
        $this::$name = $plugin_basename[0];

        $this->loader = new WinguLoader();
        $this->setLocale();
        $this->defineAdminHooks();
        $this->definePublicHooks();

        self::$API_URL = Configuration::BACKEND_URL_PRODUCTION;
        self::refreshApiKey();
    }

    public static function refreshApiKey(): void
    {
        $messageFactory = new GuzzleMessageFactory();
        self::$API = new WinguApi(
            new Configuration((string)get_option(self::GLOBAL_KEY_API_KEY), self::$API_URL),
            new Client($messageFactory),
            $messageFactory,
            new SymfonySerializerHydrator()
        );
    }

    public static function instance(): Wingu
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    private function setLocale(): void
    {
        $wingu_i18n = new WinguI18n();
        $wingu_i18n->setDomain(self::name());
        $this->loader->addAction('plugins_loaded', $wingu_i18n, 'loadPluginTextDomain');
    }

    private function defineAdminHooks(): void
    {
        $plugin_basename = explode('/', $this::$basename);
        $plugin_name = $plugin_basename[0] . '/' . $plugin_basename[2];
        $wingu_admin = new WinguAdmin(self::name(), self::version());
        $this->loader->addAction('admin_menu', $wingu_admin, 'wingu_menu');
        $this->loader->addAction('admin_notices', $wingu_admin, 'wingu_api_key_notice');
        $this->loader->addAction('admin_init', $wingu_admin, 'wingu_settings_init');
        $this->loader->addAction('manage_posts_custom_column', $wingu_admin, 'wingu_custom_posts_column', 10, 2);
        $this->loader->addAction('manage_pages_custom_column', $wingu_admin, 'wingu_custom_posts_column', 10, 2);
        $this->loader->addAction('add_meta_boxes', $wingu_admin, 'wingu_meta_box');
        $this->loader->addAction('post_updated', $wingu_admin, 'wingu_post_updated', 50, 2);
        $this->loader->addAction('save_post', $wingu_admin, 'wingu_save_post_meta', 100);
        $this->loader->addAction('wp_ajax_check_api_key', $wingu_admin, 'check_wingu_api_key');
        $this->loader->addAction('wp_ajax_get_wingu_private_triggers', $wingu_admin, 'get_wingu_private_triggers');
        $this->loader->addAction('wp_ajax_get_wingu_private_contents', $wingu_admin, 'get_wingu_private_contents');
        $this->loader->addAction('wp_ajax__ajax_fetch_wingu_triggers', $wingu_admin, '_ajax_fetch_wingu_triggers_callback');
        $this->loader->addAction('admin_footer', $wingu_admin, 'ajax_wingu_trigger_pagination_script');

        $this->loader->addFilter('plugin_action_links_'.$plugin_name, $wingu_admin, 'wingu_settings_link');
        $this->loader->addFilter('manage_posts_columns', $wingu_admin, 'add_wingu_posts_column');
        $this->loader->addFilter('manage_pages_columns', $wingu_admin, 'add_wingu_posts_column');

        $this->loader->addAction('admin_enqueue_scripts', $wingu_admin, 'enqueue_styles');
        $this->loader->addAction('admin_enqueue_scripts', $wingu_admin, 'enqueue_scripts');
    }

    private function definePublicHooks(): void
    {
        $wingu_public = new WinguPublic(self::name(), self::version());
        $this->loader->addAction('wp_enqueue_scripts', $wingu_public, 'enqueue_styles');
        $this->loader->addAction('wp_enqueue_scripts', $wingu_public, 'enqueue_scripts');
    }

    public function run(): void
    {
        $this->loader->run();
    }

    public static function name(): string
    {
        return self::$name;
    }

    public function loader(): WinguLoader
    {
        return $this->loader;
    }

    public static function version(): string
    {
        return self::$version;
    }
}

Wingu::instance();