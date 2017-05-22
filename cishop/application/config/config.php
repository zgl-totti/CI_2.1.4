<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['base_url']	= "http://aczm.medtu.com/cishop/";
$config['index_page'] = "index.php";
$config['uri_protocol']	= "AUTO";
$config['url_suffix'] = "";
$config['language']	= "english";
$config['charset'] = "UTF-8";
$config['enable_hooks'] = FALSE;
$config['subclass_prefix'] = 'MY_';
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';
$config['enable_query_strings'] = TRUE;
$config['controller_trigger'] 	= 'c';
$config['function_trigger'] 	= 'm';
$config['directory_trigger'] 	= 'd';
$config['log_threshold'] = 0;
$config['log_path'] = '';
$config['log_date_format'] = 'Y-m-d H:i:s';
$config['cache_path'] = '';
$config['encryption_key'] = "";
$config['sess_cookie_name']		= 'ci_session';
$config['sess_expiration']		= 7200;
$config['sess_encrypt_cookie']	= FALSE;
$config['sess_use_database']	= TRUE;
$config['sess_table_name']		= 'lcn_sessions';
$config['sess_match_ip']		= FALSE;
$config['sess_match_useragent']	= TRUE;
$config['sess_time_to_update'] 	= 300;

$config['cookie_prefix']	= "";
$config['cookie_domain']	= "";
$config['cookie_path']		= "/";

$config['global_xss_filtering'] = FALSE;

/*
|--------------------------------------------------------------------------
| Output Compression
|--------------------------------------------------------------------------
|
| Enables Gzip output compression for faster page loads.  When enabled,
| the output class will test whether your server supports Gzip.
| Even if it does, however, not all browsers support compression
| so enable only if you are reasonably sure your visitors can handle it.
|
| VERY IMPORTANT:  If you are getting a blank page when compression is enabled it
| means you are prematurely outputting something to your browser. It could
| even be a line of whitespace at the end of one of your scripts.  For
| compression to work, nothing can be sent before the output buffer is called
| by the output class.  Do not "echo" any values with compression enabled.
|
*/
$config['compress_output'] = FALSE;

/*
|--------------------------------------------------------------------------
| Master Time Reference
|--------------------------------------------------------------------------
|
| Options are "local" or "gmt".  This pref tells the system whether to use
| your server's local time as the master "now" reference, or convert it to
| GMT.  See the "date helper" page of the user guide for information
| regarding date handling.
|
*/
$config['time_reference'] = 'local';


/*
|--------------------------------------------------------------------------
| Rewrite PHP Short Tags
|--------------------------------------------------------------------------
|
| If your PHP installation does not have short tag support enabled CI
| can rewrite the tags on-the-fly, enabling you to utilize that syntax
| in your view files.  Options are TRUE or FALSE (boolean)
|
*/
$config['rewrite_short_tags'] = FALSE;


/*
|--------------------------------------------------------------------------
| Reverse Proxy IPs
|--------------------------------------------------------------------------
|
| If your server is behind a reverse proxy, you must whitelist the proxy IP
| addresses from which CodeIgniter should trust the HTTP_X_FORWARDED_FOR
| header in order to properly identify the visitor's IP address.
| Comma-delimited, e.g. '10.0.1.200,10.0.1.201'
|
*/
$config['proxy_ips'] = '';

/*
|--------------------------------------------------------------------------
| 分页配置
|--------------------------------------------------------------------------
|
*/
$config['pagination'] = array(
    'full_tag_open' => '',
    'full_tag_close' => '',

    'first_link' => '&lt;&lt; 第一页',
    'first_tag_open' => '<span>',
    'first_tag_close' => '</span>',

    'last_link' => '尾页 &gt;&gt;',
    'last_tag_open' => '<span>',
    'last_tag_close' => '</span>',

    'next_link' => '下一页',
    'next_tag_open' => '<span>',
    'next_tag_close' => '</span>',

    'prev_link' => '前一页',
    'prev_tag_open' => '<span>',
    'prev_tag_close' => '</span>',

    'cur_tag_open' => '<span class="current">',
    'cur_tag_close' => '</span>',

    'num_tag_open' => '<span>',
    'num_tag_close' => '</span>',

    'per_page' => 32,

	'num_links' => 2,
);
/* End of file config.php */
/* Location: ./system/application/config/config.php */