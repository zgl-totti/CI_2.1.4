<?php
	templates('search','header');
?>
<style>
.table{border-color:#f8f8f8;font-size:14px;}
.table tr{height:50px;}
</style>
	<body>

		<div class="tab-panel">			
			<a href="<?php echo base_url('api.php/search');?>" class="active"><span>文献</span></a>
			<a href="<?php echo base_url('api.php/search/drugs');?>" ><span>药品</span></a>
			<a href="<?php echo base_url('api.php/search/diseases');?>"  ><span>疾病</span></a>		
		</div>

		<div class="search-panel">
			<form class="form-search" method='get' action="<?php echo base_url('api.php/search/pubmed')?>">
			<dl>
				
				<dd class="right"><input type="text" placeholder="Search" name='q' onkeyup="(function(e){if(e.keyCode==13){document.getElementById('search-btn').click();}})(event)" autocomplete= "off"></dd>
				<dd class="left"><input type="submit" value='搜索'></dd>
			</dl>
			</form>
		</div>
		<table border = '1'   width="95%"  align="center" class='table' cellpadding="2" cellspacing="0"> 
			<tr bgcolor="#EAEAEA" >
				<td><span >数据分类</span></td>
				<td><span >数据量</span></td>
				<td><span >特色</span></td>
			</tr>
			<tr>
				<td>Pubmed检索</td>
				<td>2500万</td>
				<td>同步pubmed</td>
			</tr>
			<tr>
				<td>期刊</td>
				<td>1.5万</td>
				<td>全文下载</td>
			</tr>
			<tr>
				<td>关键词</td>
				<td>50万</td>
				<td>智能搜索</td>
			</tr>
			<tr>
				<td>疾病数据</td>
				<td>6000</td>
				<td>基本覆盖全部疾病</td>
			</tr>
			<tr>
				<td>药品数据</td>
				<td>20万</td>
				<td>基本覆盖全部药品</td>
			</tr>
			<tr>
				<td>资讯</td>
				<td>2.5万</td>
				<td>不断更新</td>
			</tr>
			<tr>
				<td>病例数据</td>
				<td>1.2万</td>
				<td>需要身份验证</td>
			</tr>
		</table>
	</body>
</html>