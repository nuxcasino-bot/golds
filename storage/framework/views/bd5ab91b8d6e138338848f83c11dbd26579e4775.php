            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo app('translator')->get('app.api_key'); ?> <small><a href="javascript:;" id="generateKey"><?php echo app('translator')->get('app.generate'); ?></a></small></label>
            <input type="text" class="form-control" id="keygen" name="keygen" required value="<?php echo e($edit ? $api->keygen : ''); ?>">
			  </div>
			</div>
			
            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo app('translator')->get('app.api_ip'); ?></label>
            <input type="text" class="form-control" id="ip" name="ip" value="<?php echo e($edit ? $api->ip : ''); ?>">
			  </div>
			</div>
			
            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo app('translator')->get('app.shops'); ?></label>
            <?php echo Form::select('shop_id', $shops, $edit ? $api->shop_id : '', ['class' => 'form-control']); ?>

			  </div>
			</div>
			
            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo app('translator')->get('app.status'); ?></label>
            <?php echo Form::select('status', ['Disabled', 'Active'], $edit ? $api->status : '', ['class' => 'form-control']); ?>

			  </div>
			</div><?php /**PATH /Users/ak/Herd/goldsvet-script/resources/views/backend/api/partials/base.blade.php ENDPATH**/ ?>