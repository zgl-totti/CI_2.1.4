<form class="form-horizontal" method="post" action="<?php echo site_aurl('avatar');?>" name="manageuserform" id="manageuserform" novalidate="novalidate" enctype="multipart/form-data">
							<input type='hidden' name='token' id='token' value='32b32208bb094064dec658740d916766' />
							<div class="control-group">
								<label class="control-label">项目图片</label>
								<div class="controls">
									<input type="file" class="input-xxlarge" id="thumb" name="thumb" />
								</div>
							</div>

							
							<div class="form-actions">
								<input type="submit" value="确定" name="submit" class="btn btn-primary" />
							</div>
						</form>