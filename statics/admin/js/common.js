function confirmurl(url,message) {
	if( !message ) message	=	'确认进行该操作吗？';
	if(confirm(message)) redirect(url);
}
function redirect(url) {
	location.href = url;
}