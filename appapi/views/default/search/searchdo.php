<?php
	templates('search','header');
?>
	<body>

		<div class="tab-panel">			
			<a href="<?php echo base_url('api.php/search');?>" ><span>文献</span></a>
			<a href="<?php echo base_url('api.php/search/drugs');?>" class="active"><span>药品</span></a>
			<a href="<?php echo base_url('api.php/search/diseases');?>"><span>疾病</span></a>		
		</div>

		<div class="search-panel">
			<form class="form-search" method='get' action="<?php echo base_url('api.php/search/searchdo')?>">
			<dl>
				<dd class="right"><input type="text" placeholder="Search" name='q' onkeyup="(function(e){if(e.keyCode==13){document.getElementById('search-btn').click();}})(event)" autocomplete= "off"></dd>
				<dd class="left"><input type="submit" value='搜索'></dd>
			</dl>
			</form>
		</div>

		

		<div class="search-list">
			
			<ul class="news-list">
			<?php
				if(isset($info) && $info){
					foreach($info as $k=>$v){
			?>
				<li>
					<a href="<?php echo site_url('search/drugsshow/'.$v['id']);?>">							
						<h3>
							<?php echo $v['title'];?>
							<?php echo $v['business'] ? "(".str_cut($v['business'],30).")" : '';?>
						</h3>		
					</a>
				</li>
				<?php
						}
					}else{
				?>
				<li>
					<a href="javascript:;">							
						<h3>暂未搜索到结果</h3>					
					</a>
				</li>
				<?php
					}
				?>
			</ul>
		</div>

		
		<div class="pager"><?php echo isset($pages) ? $pages : '';?></div>

		
	</body>
</html>