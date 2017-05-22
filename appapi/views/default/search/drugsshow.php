<?php
	templates('search','header');
?>
	<body>

		<div class="tab-panel">			
			<a href="<?php echo base_url('api.php/search');?>" ><span>文献</span></a>
			<a href="<?php echo base_url('api.php/search/drugs');?>" class="active"><span>药品</span></a>
			<a href="<?php echo base_url('api.php/search/diseases');?>"  ><span>疾病</span></a>		
		</div>

		<div class="search-panel">
			<form class="form-search" method='get' action="<?php echo base_url('api.php/search/searchdo')?>">
			<input type='hidden' name='type' value='2'>
			<dl>
				<dd class="right"><input type="text" placeholder="Search" name='q' onkeyup="(function(e){if(e.keyCode==13){document.getElementById('search-btn').click();}})(event)" autocomplete= "off"></dd>
				<dd class="left"><input type="submit" value='搜索'></dd>
			</dl>
			</form>
		
		</div>


		<h2 class="title title-style-2"><?php echo $title;?></h2>
		<div class="article">
			<p>通用名：<?php echo $tname;?></p>
			<p>英文名称：<?php echo $ename;?></p>
			<?php if( $element ) { ?>
			<p>成分：<?php echo $element;?></p>
			<?php } ?>
			
			<?php if( $size ) { ?>
			<p>规格：<?php echo $size;?></p>
			<?php } ?>
			
			<?php if( $jixing ) { ?>
			<p>剂型：<?php echo $jixing;?></p>
			<?php } ?>
			
			<?php if( $indication ) { ?>
			<p>适应症：<?php echo $indication;?></p>
			<?php } ?>
			<?php if( $use ) { ?>
			<p>用法：<?php echo $use;?></p>
			<?php } ?>
			
			<?php if( $reaction ) { ?>
			<p>不良反应：<?php echo $reaction;?></p>
			<?php } ?>
			
			<?php if( $taboo ) { ?>
			<p>禁忌：<?php echo $taboo;?></p>
			<?php } ?>
			
			<?php if( $attention ) { ?>
			<p>注意事项：<?php echo $attention;?></p>
			<?php } ?>
			
			<?php if( $store ) { ?>
			<p>储存：<?php echo $store;?></p>
			<?php } ?>
			
			<?php if( $ratify ) { ?>
			<p>批准文号：<?php echo $ratify;?></p>
			<?php } ?>
			
			<?php if( $gravida ) { ?>
			<p>孕妇：<?php echo $gravida;?></p>
			<?php } ?>
			
			<?php if( $mf ) { ?>
			<p>分子式：<?php echo $mf;?></p>
			<?php } ?>
			
			<?php if( $mw ) { ?>
			<p>分子量：<?php echo $mw;?></p>
			<?php } ?>
			
			<?php if( $sports ) { ?>
			<p>运动员：<?php echo $sports;?></p>
			<?php } ?>
			
			<?php if( $character ) { ?>
			<p>性状：<?php echo $character;?></p>
			<?php } ?>
			
			<?php if( $pharmacology ) { ?>
			<p>药理作用：<?php echo $pharmacology;?></p>
			<?php } ?>
			
			<?php if( $pharmacokinetics ) { ?>
			<p>药代动力学：<?php echo $pharmacokinetics;?></p>
			<?php } ?>
			
			<?php if( $mutual ) { ?>
			<p>相互作用：<?php echo $mutual;?></p>
			<?php } ?>
			
			<?php if( $children ) { ?>
			<p>儿童用药：<?php echo $children;?></p>
			<?php } ?>
			
			<?php if( $theold ) { ?>
			<p>老人用药：<?php echo $theold;?></p>
			<?php } ?>
			
			
		</div>

		
	</body>
</html>