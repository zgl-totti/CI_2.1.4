<?php $this->load->view('common/header');?>


<?php $this->load->view('common/main_left_nav');?> 
<div id="content">
	<div id="content-header">
		<h1>权限管理 <?php if (isset($roleInfo) && $roleInfo ) {echo '('.$roleInfo['rolename'].')'; }?></h1>
	</div>
	<div class='clearfix'></div>
	
	<div class="container-fluid">
		
		<div class='row-fluid'>
			<div class='span12'>
				<a href='javascript:;' class='btn' onclick="javascript:$('input.tabcheckbox').attr('checked', true)">全选</a>
				
				<a href='javascript:;' class='btn' onclick="javascript:$('input.tabcheckbox').attr('checked', false)">取消</a>
				
				<?php
					if( isset($categorys) && $categorys ){
				?>
			
				<div class="widget-box">
					<div class="widget-content nopadding">
						<form class="form-horizontal" method="post" action="<?php echo site_aurl('seeting/role/priv');?>" name="sitemodelfomr" id="sitemodelfomr" novalidate="novalidate" >
							<input type='hidden' name='roleid' value='<?php echo $roleid;?>' />
							<table class="table table-bordered table-striped" id="tabletreeview">
								<tbody>
								<?php
									echo $categorys;
								?>
								</tbody>
							</table>
							<div class="form-actions">
								<input type="submit" value="添加" name="submit" class="btn btn-primary" />
							</div>
						</form>
					</div>
				</div>
				<?php
					}else{
				?>
				<div class="alert alert-error">
					<button data-dismiss="alert" class="close">×</button>
					暂无相关信息！
				</div>
				
				<?php 
					}
				?>
			</div>
		
		</div>
		
	</div>
</div>




<link href="<?php echo base_url('statics/admin/css/jquery.treeTable.css');?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url('statics/admin/js/jquery.treetable.js');?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#tabletreeview").treeTable({
			indent: 20
		});
	});
  function checknode(obj)
  {
      var chk = $("input[type='checkbox']");
      var count = chk.length;
      var num = chk.index(obj);
      var level_top = level_bottom =  chk.eq(num).attr('level')
      for (var i=num; i>=0; i--)
      {
              var le = chk.eq(i).attr('level');
              if(eval(le) < eval(level_top)) 
              {
                  chk.eq(i).attr("checked",'checked');
                  var level_top = level_top-1;
              }
      }
      for (var j=num+1; j<count; j++)
      {
              var le = chk.eq(j).attr('level');
              if(chk.eq(num).attr("checked")=='checked') {
                  if(eval(le) > eval(level_bottom)) chk.eq(j).attr("checked",'checked');
                  else if(eval(le) == eval(level_bottom)) break;
              }
              else {
                  if(eval(le) > eval(level_bottom)) chk.eq(j).attr("checked",false);
                  else if(eval(le) == eval(level_bottom)) break;
              }
      }
  }
</script>


<?php $this->load->view('common/footer');?>
