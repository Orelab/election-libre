
	<fieldset id="sign">
		<legend><?=lang('vote_sign')?></legend>
	
		<?=lang('vote_sign_detail')?>

		<br/>
		
		<label for="signature"><?=lang('vote_key')?></label>
		<input type="password" name="signature" value="" title="<?=lang('vote_key_detail')?>"/>

		<aside>
			<button class="vote/thank"><?=lang('vote_do_vote')?></button>
		</aside>
	</fieldset>