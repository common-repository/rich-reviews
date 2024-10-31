<?php
?>
	<tr class="rr_form_row">
		<td class="rr_form_heading <?php if($require){ echo 'rr_required'; } ?>">
			<?php echo esc_html($label); ?>
		</td>
		<td class="rr_form_input">
			<?php echo '<span class="form-err">' .  esc_html($error) . '</span>'; ?>
			<textarea class="rr_large_input" name="rText" rows="10"><?php echo esc_html($rFieldValue); ?></textarea>
		</td>
	</tr>