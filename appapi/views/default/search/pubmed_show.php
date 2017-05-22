<?php
	templates('search','header');
?>
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


		<h2 class="title title-style-2"><?php echo $title;?></h2>
		<p class="subtitle"><?php echo $authorstr;?></p>
		
		<div class="article">
			<p><?php echo $content;?></p>
		</div>

		
	</body>
</html>