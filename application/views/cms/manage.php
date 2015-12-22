<?php include( APPPATH . '/views/header.php' ); ?>

<section id="manage">

	<fieldset id="intro">
	
		<?= lang('cms_manage_index'); ?>
	
		<aside>
			<button class="next"><?= lang('cms_manage_start'); ?></button>
		</aside>
	</fieldset>
	

	<fieldset id="organizer">
		<legend><?= lang('cms_manage_contact'); ?></legend>
		
		<p><?= lang('cms_manage_info'); ?></p>
		
		<label for="admin_name"><?= lang('cms_manage_name'); ?></label>
		<input type="text" name="admin_name" value="" />
		<br/>
		
		<label for="admin_surname"><?= lang('cms_manage_surname'); ?></label>
		<input type="text" name="admin_surname" value="" />
		<br/>

		<label for="admin_email"><?= lang('cms_manage_email'); ?></label>
		<input type="email" name="admin_email" value="" />
		<br/>
				
		<label for="business"><?= lang('cms_manage_business'); ?></label>
		<input type="text" name="business" value="" title="<?= lang('cms_manage_business_detail'); ?>" />
		<br/>
	
		<aside>
			<button class="prev"><?= lang('cms_manage_prev'); ?></button>
			<button class="next"><?= lang('cms_manage_next'); ?></button>
		</aside>
	</fieldset>


	<fieldset id="election">
		<?= lang('cms_manage_election'); ?>
		
		<label for="title"><?= lang('cms_manage_title'); ?></label>
		<input type="text" name="title" value="" />
		<br/>
				
		<label for="page"><?= lang('cms_manage_msg'); ?></label>
		<textarea name="page" id="richtext" class="new"></textarea>
		<br/>
		<br/>
				
		<legend><?= lang('cms_manage_planification'); ?></legend>

		<label for="start"><?= lang('cms_manage_begining'); ?></label>
		<input type="datetime" name="start" value="" />
		<br/>
				
		<label for="end"><?= lang('cms_manage_ending'); ?></label>
		<input type="datetime" name="end" value="" />
		<br/>
	
		<aside>
			<button class="prev"><?= lang('cms_manage_prev'); ?></button>
			<button class="next"><?= lang('cms_manage_next'); ?></button>
		</aside>
	</fieldset>
		
	
	<fieldset id="candidates">
		<?= lang('cms_manage_candidates'); ?>
	
		<div id="choices"></div>
		<br/>
	
		<?= lang('cms_manage_winners'); ?>
		
		<input type="number" name="winners" value="1" step="1" min="1" max="50" />
		<br/>

		<aside>
			<button class="prev"><?= lang('cms_manage_prev'); ?></button>
			<button class="next"><?= lang('cms_manage_next'); ?></button>
		</aside>
	</fieldset>
	
	
	<fieldset id="electors">
		<?= lang('cms_manage_electors'); ?>
	
		<div id="elector-list-filler">
			<a href="<?php echo site_url() ?>assets/sample.csv"><?= lang('cms_manage_template'); ?></a>
			<img src="<?php echo site_url() ?>assets/img/arrow.png" alt="next step" />
			<input type="file" name="file" value="" />
			<img src="<?php echo site_url() ?>assets/img/arrow-turn.png" alt="next step" />
		</div>
				
		<div id="elector-list"></div>
	
		<aside>
			<button class="prev"><?= lang('cms_manage_prev'); ?></button>
			<button class="next"><?= lang('cms_manage_next'); ?></button>
		</aside>		
	</fieldset>
	
	
	<fieldset id="thanks">
		<?= lang('cms_manage_thanks'); ?>

		<aside>
			<button class="prev"><?= lang('cms_manage_prev'); ?></button>
			<button class="save"><?= lang('cms_manage_save'); ?></button>
		</aside>		
	</fieldset>

</section>


<?php include( APPPATH . '/views/footer.php' ); ?>
