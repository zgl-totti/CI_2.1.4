
//	关键词订阅
function attention( id ){
	if( !id ){
		return false;
	}
	$.ajax({
		type: "GET",
		url: "/index.php/keywords/attention/"+id,
		data: "",
		dataType:"json",
		success: function(msg){
			if(msg && msg.message == 1){
				$('.attention_'+id).html('取消关注');
			}else if(msg && msg.message == 2){
				$('.attention_'+id).html('关注');
			}else{
				$('.attention_'+id).html('关注失败');
			}
		}
	});
}