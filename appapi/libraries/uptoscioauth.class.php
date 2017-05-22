<?php

/**
 * @ignore
 */
class OAuthException extends Exception {
	// pass
}


/**
 * OAuth 认证类
 */
class UptosciOAuth2 {
	/**
	 * @ignore
	 */
	public $client_id;
	/**
	 * @ignore
	 */
	public $client_secret;
	/**
	 * @ignore
	 */
	public $access_token;
	/**
	 * @ignore
	 */
	public $refresh_token;
	/**
	 * Contains the last HTTP status code returned. 
	 *
	 * @ignore
	 */
	public $http_code;
	/**
	 * Contains the last API call.
	 *
	 * @ignore
	 */
	public $url;
	/**
	 * Set up the API root URL.
	 *
	 * @ignore
	 */
	public $host = "http://api.uptosci.com/index.php/oauth/";
	/**
	 * Set timeout default.
	 *
	 * @ignore
	 */
	public $timeout = 30;
	/**
	 * Set connect timeout.
	 *
	 * @ignore
	 */
	public $connecttimeout = 30;
	/**
	 * Respons format.
	 *
	 * @ignore
	 */
	public $format = 'json';

	/**
	 * Decode returned json data.
	 *
	 * @ignore
	 */
	public $decode_json = TRUE;
	/**
	 * Contains the last HTTP headers returned.
	 *
	 * @ignore
	 */
	public $http_info;
	/**
	 * Set the useragnet.
	 *
	 * @ignore
	 */
	public $useragent = 'Uptosci OAuth2 ';

	/**
	 * print the debug info
	 *
	 * @ignore
	 */
	public $debug = FALSE;

	/**
	 * boundary of multipart
	 * @ignore
	 */
	public static $boundary = '';

	/**
	 * Set API URLS
	 */
	/**
	 * @ignore
	 */
	function accessTokenURL(){ 
		return 'http://api.uptosci.com/index.php/oauth/oauth2/access_token'; 
	}
	/**
	 * @ignore
	 */
	function authorizeURL(){
		return 'http://api.uptosci.com/index.php/oauth/oauth2/authorize';
	}


	/**
	 * @ignore
	 */
	function authenticateURL(){
		return 'http://api.uptosci.com/index.php/oauth/oauth2/authenticate';
	}

	/**
	 * construct
	 */
	function __construct($client_id, $client_secret, $access_token = NULL, $refresh_token = NULL) {
		$this->client_id = $client_id;
		$this->client_secret = $client_secret;
		$this->access_token = $access_token;
		$this->refresh_token = $refresh_token;
	}

	/**
	 * authorize接口
	 * @param string $url 授权后的回调地址,需与回调地址一致
	 * @param string $response_type 支持的值包括 code 和token 默认值为code
	 * @param bool $login 是否为用户登录处理
	 * @return array
	 */
	function getAuthorizeURL( $url, $response_type = 'code' ,$login = false) {
		$params = array();
		$params['client_id'] = $this->client_id;
		$params['redirect_uri'] = $url;
		$params['response_type'] = $response_type;
		if ( $login ) {
			return $this->authenticateURL() . "?" . http_build_query($params);
		}else{
			return $this->authorizeURL() . "?" . http_build_query($params);
		}
		
	}

	/**
	 * access_token接口
	 * @param string $type 请求的类型,可以为:code, password, token
	 * @param array $keys 其他参数：
	 *  - 当$type为code时： array('code'=>..., 'redirect_uri'=>...)
	 * @return array
	 */
	function getAccessToken( $type = 'code', $keys ) {
		$params = array();
		$params['client_id'] = $this->client_id;
		$params['client_secret'] = $this->client_secret;
		
		if ( $type === 'code' ) {
			$params['grant_type'] = 'authorization_code';
			$params['code'] = $keys['code'];
			$params['redirect_uri'] = $keys['redirect_uri'];
		} else {
			throw new OAuthException("wrong auth type");
		}

		$response = $this->oAuthRequest($this->accessTokenURL(), 'POST', $params);
		
		$token = json_decode($response, true);
		
		if ( is_array($token) && !isset($token['error']) ) {
			$this->access_token = $token['access_token'];
		} else {
			throw new OAuthException("get access token failed." . $token['error']);
		}
		return $token;
	}

	/**
	 * @ignore
	 */
	function base64decode($str) {
		return base64_decode(strtr($str.str_repeat('=', (4 - strlen($str) % 4)), '-_', '+/'));
	}

	/**
	 * GET wrappwer for oAuthRequest.
	 *
	 * @return mixed
	 */
	function get($url, $parameters = array()) {
		$response = $this->oAuthRequest($url, 'GET', $parameters);
		if ($this->format === 'json' && $this->decode_json) {
			return json_decode($response, true);
		}
	
		return $response;
	}

	/**
	 * POST wreapper for oAuthRequest.
	 *
	 * @return mixed
	 */
	function post($url, $parameters = array(), $multi = false) {
		$response = $this->oAuthRequest($url, 'POST', $parameters, $multi );
		if ($this->format === 'json' && $this->decode_json) {
			return json_decode($response, true);
		}
		return $response;
	}

	/**
	 * DELTE wrapper for oAuthReqeust.
	 *
	 * @return mixed
	 */
	function delete($url, $parameters = array()) {
		$response = $this->oAuthRequest($url, 'DELETE', $parameters);
		if ($this->format === 'json' && $this->decode_json) {
			return json_decode($response, true);
		}
		return $response;
	}

	/**
	 * Format and sign an OAuth / API request
	 *
	 * @return string
	 * @ignore
	 */
	function oAuthRequest($url, $method, $parameters, $multi = false) {
		if (strrpos($url, 'http://') !== 0 && strrpos($url, 'https://') !== 0) {
			$url = "{$this->host}{$url}";
		}

		switch ($method) {
			case 'GET':
				$url = $url . '?' . http_build_query($parameters);
				return $this->http($url, 'GET');
			default:
				$headers = array();
				if (!$multi && (is_array($parameters) || is_object($parameters)) ) {
					$body = http_build_query($parameters);
				} else {
					$body = self::build_http_query_multi($parameters);
					$headers[] = "Content-Type: multipart/form-data; boundary=" . self::$boundary;
				}
				return $this->http($url, $method, $body, $headers);
		}
	}

	/**
	 * Make an HTTP request
	 *
	 * @return string API results
	 * @ignore
	 */
	function http($url, $method, $postfields = NULL, $headers = array()) {
		$this->http_info = array();
		$ci = curl_init();
		/* Curl settings */
		curl_setopt($ci, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
		curl_setopt($ci, CURLOPT_USERAGENT, $this->useragent);
		curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, $this->connecttimeout);
		curl_setopt($ci, CURLOPT_TIMEOUT, $this->timeout);
		curl_setopt($ci, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ci, CURLOPT_ENCODING, "");
		curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ci, CURLOPT_HEADERFUNCTION, array($this, 'getHeader'));
		curl_setopt($ci, CURLOPT_HEADER, FALSE);

		switch ($method) {
			case 'POST':
				curl_setopt($ci, CURLOPT_POST, TRUE);
				if (!empty($postfields)) {
					curl_setopt($ci, CURLOPT_POSTFIELDS, $postfields);
					$this->postdata = $postfields;
				}
				break;
			case 'DELETE':
				curl_setopt($ci, CURLOPT_CUSTOMREQUEST, 'DELETE');
				if (!empty($postfields)) {
					$url = "{$url}?{$postfields}";
				}
		}

		if ( isset($this->access_token) && $this->access_token )
			$headers[] = 'Authorization: OAuth ="'.$this->access_token.'"';

		if ( !empty($this->remote_ip) ) {
			if ( defined('SAE_ACCESSKEY') ) {
				$headers[] = "SaeRemoteIP: " . $this->remote_ip;
			} else {
				$headers[] = "API-RemoteIP: " . $this->remote_ip;
			}
		} else {
			if ( !defined('SAE_ACCESSKEY') ) {
				$headers[] = "API-RemoteIP: " . $_SERVER['REMOTE_ADDR'];
			}
		}
		
		curl_setopt($ci, CURLOPT_URL, $url );
		curl_setopt($ci, CURLOPT_HTTPHEADER, $headers );
		curl_setopt($ci, CURLINFO_HEADER_OUT, TRUE );

		$response = curl_exec($ci);

		$this->http_code = curl_getinfo($ci, CURLINFO_HTTP_CODE);
		$this->http_info = array_merge($this->http_info, curl_getinfo($ci));
		$this->url = $url;

		if ($this->debug) {
			echo "=====post data======\r\n";
			var_dump($postfields);

			echo "=====headers======\r\n";
			print_r($headers);

			echo '=====request info====='."\r\n";
			print_r( curl_getinfo($ci) );

			echo '=====response====='."\r\n";
			print_r( $response );
		}
		curl_close ($ci);
		return $response;
	}

	/**
	 * Get the header info to store.
	 *
	 * @return int
	 * @ignore
	 */
	function getHeader($ch, $header) {
		$i = strpos($header, ':');
		if (!empty($i)) {
			$key = str_replace('-', '_', strtolower(substr($header, 0, $i)));
			$value = trim(substr($header, $i + 2));
			$this->http_header[$key] = $value;
		}
		return strlen($header);
	}

	/**
	 * @ignore
	 */
	public static function build_http_query_multi($params) {
		if (!$params) return '';

		uksort($params, 'strcmp');

		$pairs = array();

		self::$boundary = $boundary = uniqid('------------------');
		$MPboundary = '--'.$boundary;
		$endMPboundary = $MPboundary. '--';
		$multipartbody = '';

		foreach ($params as $parameter => $value) {

			if( in_array($parameter, array('pic', 'image')) && $value{0} == '@' ) {
				$url = ltrim( $value, '@' );
				$content = file_get_contents( $url );
				$array = explode( '?', basename( $url ) );
				$filename = $array[0];

				$multipartbody .= $MPboundary . "\r\n";
				$multipartbody .= 'Content-Disposition: form-data; name="' . $parameter . '"; filename="' . $filename . '"'. "\r\n";
				$multipartbody .= "Content-Type: image/unknown\r\n\r\n";
				$multipartbody .= $content. "\r\n";
			} else {
				$multipartbody .= $MPboundary . "\r\n";
				$multipartbody .= 'content-disposition: form-data; name="' . $parameter . "\"\r\n\r\n";
				$multipartbody .= $value."\r\n";
			}

		}

		$multipartbody .= $endMPboundary;
		return $multipartbody;
	}
}



class uptosciClient{
	/**
	 * 构造函数
	 * 
	 * @access public
	 * @param mixed $akey KEY
	 * @param mixed $skey SECRET
	 * @param mixed $access_token OAuth认证返回的token
	 * @param mixed $refresh_token OAuth认证返回的token secret
	 * @return void
	 */
	function __construct( $akey, $skey, $access_token, $refresh_token = NULL)
	{
		$this->oauth = new UptosciOAuth2( $akey, $skey, $access_token, $refresh_token );
	}

	/**
	 * 开启调试信息
	 * @param bool $enable 是否开启调试信息
	 */
	function set_debug( $enable )
	{
		$this->oauth->debug = $enable;
	}


	/**
	* 获取最新报道
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param
	*/
	public function reprots_list( $report = '' , $page = '' ){
		$params = array();
		if($report){
			$params['report'] = $report;
		}
		$params['page']	  = $page;
		$result =  $this->oauth->get('report', $params);
		return $result;
	}
	
	/**
	* 获取最新报道
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param
	*/
	public function reprots_show( $id ){
		$params = array('id'=>$id);
		$result =  $this->oauth->get('report/show', $params);
		return $result;
	}

	/**
	* 最新报道搜索
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param
	*/
	public function reprots_search( $keywords , $page = '1' ){
		$params = array('keywords'=>$keywords ,'page' => $page );
		$result =  $this->oauth->post('report/search', $params);
		return $result;
	}
	
	/**
	* 文献搜索
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param
	*/
	public function search( $keywords , $page = '1' ){
		$params = array('keywords'=>$keywords ,'page' => $page );
		$result =  $this->oauth->post('pubmed/searchresult', $params);
		return $result;
	}

	/**
	* 文献搜索
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param
	*/
	public function lsearch( $keywords , $page = '1' ){
		$params = array('keywords'=>$keywords ,'page' => $page );
		$result =  $this->oauth->post('pubmed/searchlresult', $params);
		return $result;
	}
	
	/**
	* 文献搜索
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param
	*/
	public function showdetail( $pmid ){
		$params = array('pmid'=>$pmid  );
		$result =  $this->oauth->get('pubmed/showdetail', $params);
		return $result;
	}
	
	/**
	* 期刊科室列表
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param
	*/
	public function medical(){
		$params = array();
		$result =  $this->oauth->get('periodical/medical', $params);
		return $result;
	}
	
	/**
	* 科室所对应的期刊列表
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param
	*/
	public function journallist( $id ){
		$params = array( 'id' => $id );
		$result =  $this->oauth->get('periodical/journallist', $params);
		return $result;
	}
	
	/**
	* 期刊对应下的文献信息
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param
	*/
	public function periodicalshow( $id , $page = '1' ){
		$params = array( 'id' => $id , 'page' =>$page);
		$result =  $this->oauth->get('periodical/periodicalshow', $params);
		return $result;
	}
	
	/**
	* 求助列表
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param
	*/
	public function helplists( $page = '1'){
		$params = array( 'page'=>$page );
		$result =  $this->oauth->get('help', $params);
		return $result;
	}
	
	/**
	* 添加求助
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param
	*/
	public function reghelp($pmid,$mobile){
		$params = array('pmid'=>$pmid,'mobile'=>$mobile);
		$result =  $this->oauth->post('help/reghelp', $params);
		return $result;
	}
	
	/**
	* 取消求助
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param
	*/
	public function cancelhelp($pmid){
		$params = array('pmid'=>$pmid);
		$result =  $this->oauth->post('help/removehelp', $params);
		return $result;
	}
	
	/**
	* 获取指定pmid求助状态
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$pmids pmid值，多个情况下一英文 逗号（,）分割
	*/
	public function gethelps( $pmids ){
		$params = array('pmids'=>$pmids);
		$result =  $this->oauth->post('help/gethelps', $params);
		return $result;
	}

	/**
	* 全文
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$id 
	*/
	public function getfull( $pmid ){
		$params = array('pmid'=>$pmid);
		$result =  $this->oauth->post('help/getfull', $params);
		return $result;
	}

	/**
	* 业内新闻
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param
	*/
	public function news( $page = 1){
		$params = array('page'=>$page);
		$result =  $this->oauth->get('news', $params);
		return $result;
	}
	
	/**
	* 业内新闻详情页面
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param
	*/
	public function newsshow( $id = ''){
		$params = array('id'=>$id);
		$result =  $this->oauth->get('news/show', $params);
		return $result;
	}

	/**
	* 业内新闻搜索
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param
	*/
	public function news_search( $keywords , $page = '1' ){
		$params = array('keywords'=>$keywords ,'page' => $page );
		$result =  $this->oauth->post('news/search', $params);
		return $result;
	}
	


	/**
	* OAuth授权之后，获取用户信息
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param
	*/
	public function userinfo( ){
		$params = array();
		$result =  $this->oauth->get( 'member/index' ,$params );
		return $result;
	}

	/**
	* 文章赞处理
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$id 文章id，$type 类型
	*/
	public function approve( $id , $type ){
		$params = array('id'=>$id,'type'=>$type);
		$result =  $this->oauth->post( 'approve/index' ,$params );
		return $result;
	}

	/**
	* 获得文章赞数量
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$id 文章id，$type 类型
	*/
	public function get_approve( $id , $type ){
		$params = array('id'=>$id,'type'=>$type);
		$result =  $this->oauth->post( 'approve/get' ,$params );
		return $result;
	}

	/**
	* 经典病例详情
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$id 
	*/
	public function caseshow( $id = ''){
		$params = array('id'=>$id);
		$result =  $this->oauth->get('cases/show', $params);
		return $result;
	}

	/**
	* 关键词查询
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$page 当前页
	*/
	public function keywords( $keywords , $page = '1' ){
		$params = array('keywords'=>$keywords ,'page'=>$page);
		$result =  $this->oauth->post( 'keywords' ,$params);
		Return $result;
	}

	/**
	* 关键词详情(列表信息)
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$id 
	*/
	public function keywordshow( $id = '' , $type = '',$page = '1'){
		$params = array('id'=>$id,'type'=>$type,'page'=>$page);
		$result =  $this->oauth->get('keywords/show', $params);
		return $result;
	}

	/**
	* 关键词详情(列表信息)
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$id 
	*/
	public function keywords_batch( $ids = '' , $type = '',$page = '1'){
		$params = array('ids'=>$ids,'type'=>$type,'page'=>$page);
		$result =  $this->oauth->get('keywords/showbatch', $params);
		return $result;
	}

	

	/**
	* 关键词详情
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$id 
	*/
	public function keywordinfo( $id = '' ){
		$params = array('id'=>$id);
		$result =  $this->oauth->get('keywords/info', $params);
		return $result;
	}

	/**
	* 病例详情
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$id 
	*/
	public function diseaseshow( $id ){
		$params = array('id'=>$id);
		$result =  $this->oauth->get('disease/show', $params);
		return $result;
	}

	/**
	* 药物详情
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$id 
	*/
	public function drugsshow( $id ){
		$params = array('id'=>$id);
		$result =  $this->oauth->get('drugs/shownew', $params);
		return $result;
	}

	/**
	* 方剂详情
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$id 
	*/
	public function prenameshow( $id ){
		$params = array('id'=>$id);
		$result =  $this->oauth->get('prename/show', $params);
		return $result;
	}

	/**
	* 文库详情
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$id 
	*/
	public function libraryshow( $id ){
		$params = array('id'=>$id);
		$result =  $this->oauth->get('library/show', $params);
		return $result;
	}

	/**
	* 获取评论
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param
	*/
	public function comment( $id,$type = 1,$page = 1){
		$params = array('id'=>$id,'type'=>$type,'page'=>$page);
		$result =  $this->oauth->get('comment/lists', $params);
		return $result;
	}
	/**
	* 添加评论
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$type 1:文献 2：报道 3：业内新闻
	*/
	public function addcomment( $id,$content,$type = 1){
		$params = array('id'=>$id,'content'=>$content,'type'=>$type);
		$result =  $this->oauth->post('comment/addcomment', $params);
		return $result;
	}

	/**
	* 疾病搜索
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$keywords 搜索词 $page 页数 
	*/
	public function searchdiseases( $keywords, $page = '1'  ){
		$params = array('keywords'=>$keywords ,'page' => $page );
		$result =  $this->oauth->post('searchdd/diseases', $params);
		return $result;
	}

	/**
	* 药物搜索
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$keywords 搜索词 $page 页数 
	*/
	public function searchdrugs( $keywords, $page = '1' ){
		$params = array('keywords'=>$keywords ,'page' => $page );
		$result =  $this->oauth->post('searchdd/drugs', $params);
		return $result;
	}
}