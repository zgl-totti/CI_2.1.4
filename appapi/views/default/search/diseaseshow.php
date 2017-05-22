<?php
	templates('search','header');
?>
	<body>

		<div class="tab-panel">			
			<a href="<?php echo base_url('api.php/search');?>" ><span>文献</span></a>
			<a href="<?php echo base_url('api.php/search/drugs');?>" ><span>药品</span></a>
			<a href="<?php echo base_url('api.php/search/diseases');?>"  class="active"><span>疾病</span></a>		
		</div>

		<div class="search-panel">
			<form class="form-search" method='get' action="<?php echo base_url('api.php/search/searchdis')?>">
			<input type='hidden' name='type' value='1'>
			<dl>
				<dd class="right"><input type="text" placeholder="Search" name='q' onkeyup="(function(e){if(e.keyCode==13){document.getElementById('search-btn').click();}})(event)" autocomplete= "off"></dd>
				<dd class="left"><input type="submit" value='搜索'></dd>
			</dl>
			</form>
		
		</div>


		<h2 class="title title-style-2"><?php echo $title;?></h2>
		
		<div class="article">
			<p><?php echo $content;?></p>
			<p><?php echo $symptom;?></p>
			<p><?php echo $diagnosis;?></p>
			<p><?php echo $treatment;?></p>
			<p><?php echo $prevention;?></p>
			<p><?php echo $care;?></p>
			<p><?php echo $description;?></p>
			<p><?php echo $pathogen;?></p>
			<p><?php echo $pathology;?></p>
			<p><?php echo $discriminate;?></p>
			<p><?php echo $complication;?></p>
			<p><?php echo $epidemic;?></p>
			<p><?php echo $aliases;?></p>
			<p><?php echo $position;?></p>
			
		</div>

		
	</body>
</html>