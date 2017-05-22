<?php echo $header;//装载header?>
<?php echo $top;//装载top?>
<!-- /subnavbar -->
<div class="container">
	<div class="row"><?php echo $position_left;?>
	
		<?php if($position_left && $position_right):?>
		<?php $class = 'col-sm-6'; ?>
		<?php elseif($position_left || $position_right):?>
		<?php $class = 'col-sm-9'; ?>
		<?php else:?>
		<?php $class = 'col-sm-12'; ?>
		<?php endif;?>
			
		<div id="middle" class="<?php echo $class; ?>" role="main">
			<?php echo $position_top; ?>
			
			<div class="row" style="margin-left: 0;background-color: #f5f5f5;margin-right: 0;border-bottom: solid 1px #e0e0e0;margin-bottom: 15px;">
				<div class="col-md-7">
					<ol class="breadcrumb" style="margin-bottom: 0">
					  <li><a href="<?php echo site_url('product/category');?>"><?php echo lang_line('all_product');?></a></li>
					  <?php if($manufacturer):?>
					  <li class="active"><?php echo $manufacturer['name'];?></li>
					  <?php endif;?>
					  
					</ol>
				</div>
				<div class="col-md-5 text-right">
					<?php echo sprintf(lang_line('total_number'), $manufacturer['name'], (isset($count) ? $count : '0'));?>
				</div>
			</div>
			
			<?php if($manufacturer):?>
			<div class="media">
				<div class="media-left media-middle">
					<a>
						<img class="media-object lazy" data-original="<?php echo $this->image_common->resize($manufacturer['image'], $this->config->get_config('category_image_size_w'), $this->config->get_config('category_image_size_h'), 'h');?>" alt="<?php echo $manufacturer['name'];?>" width="<?php echo $this->config->get_config('category_image_size_w');?>px" height="<?php echo $this->config->get_config('category_image_size_h');?>px">
					</a>
				</div>
				<div class="media-body">
					<h6 class="media-heading"><?php echo $manufacturer['name'];?></h6>
					<?php echo $manufacturer['description'];?>
				</div>
			</div><hr>
			<?php endif;?>
			
			<div class="row" style="margin-left: -15px" id="category-product-list">
				<?php if(isset($products)):?>
				
				<?php if($position_left && $position_right):?>
				<?php $class = 'col-sm-6'; ?>
				<?php elseif($position_left || $position_right):?>
				<?php $class = 'col-sm-4'; ?>
				<?php else:?>
				<?php $class = 'col-sm-3'; ?>
				<?php endif;?>
				
				<?php foreach($products as $product):?>
				<div class="<?php echo $class;?> col-xs-6">
					<div class="thumbnail">
						<a href="<?php echo site_url('product?product_id='.$product['product_id']);?>"><img width="<?php echo $this->config->get_config('product_list_image_size_w');?>px" height="<?php echo $this->config->get_config('product_list_image_size_h');?>px" class="lazy" data-original="<?php echo $this->image_common->resize($product['image'], $this->config->get_config('product_list_image_size_w'), $this->config->get_config('product_list_image_size_h'), 'h');?>" alt="<?php echo $product['name'];?>"></a>
						<div class="caption">
							<strong><?php echo $this->currency->Compute($product['price']);?></strong>
							<a target="_blank" href="<?php echo site_url('product?product_id='.$product['product_id']);?>"><p><?php echo $product['name'];?></p></a>
					
							<div class="row">
								<span data-toggle="tooltip" data-placement="top" title="<?php echo sprintf(lang_line('sales'), (isset($product['seal_quantity_total']) ? $product['seal_quantity_total'] : '0'));?>" class="col-sm-4 col-xs-4 text-left"><i class="glyphicon glyphicon-credit-card"></i></span>
								<span data-toggle="tooltip" data-placement="top" title="<?php echo sprintf(lang_line('reviews'), (isset($product['reviews']) ? count($product['reviews']) : '0'));?>" class="col-sm-4 col-xs-4 text-center"><i class="glyphicon glyphicon-thumbs-up"></i></span>
								<span data-toggle="tooltip" data-html="true" data-placement="top" title="<?php echo lang_line('text_business').$product['store_name'];?><br/><?php echo lang_line('refund').$product['order_rate']['refund_rate'];?><br/><?php echo lang_line('transactions').$product['order_rate']['success_rate'];?>" class="col-sm-4 col-xs-4 text-right"><i class="glyphicon glyphicon-star-empty"></i></span>
							</div>
					
						</div>
					</div>
				</div>
				<?php endforeach;?>
				<?php endif;?>
				<div class="col-md-12">
					<hr>
					<?php echo $pagination;?>
				</div>
			</div>
			<!-- /widget -->
			
			<?php echo $position_bottom; ?>
		</div>
		<?php echo $position_right; ?>
		
	</div>
	<script>
		var p_width = $('#category-product-list').width();
		if(p_width < 850 && p_width > 600){
			$('#category-product-list .col-xs-6').attr("class", "col-sm-4 col-xs-6");
		}
		if(p_width > 850){
			$('#category-product-list .col-xs-6').attr("class", "col-sm-3 col-xs-6");
		}
		if(p_width < 600){
			$('#category-product-list .col-xs-6').attr("class", "col-sm-6 col-xs-6");
		}
	</script>
</div>
<!-- /row --> 
</div>
<!-- /container -->
<?php echo $footer;//装载header?>