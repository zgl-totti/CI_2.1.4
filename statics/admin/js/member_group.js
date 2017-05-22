var  delgroup = function(groupid){
	if (confirm('确定删除ID='+groupid+'的用户组?')) {
		$.post("/admin.php/member/member_group/d", {groupid:groupid},function(data){
			if(data=='1'){
				showTips('删除成功!',3);
				$('.tr_'+groupid).hide();
			}else{
				showTips('删除出现异常!',3);
			}
		});
		return true;
	}
	return false;
}

var showTips = function(tips,time ){
	$('.showmsg').html(tips).show();
	setTimeout(function(){$('.showmsg' ).fadeOut();},(time * 1000 ) );
} 
