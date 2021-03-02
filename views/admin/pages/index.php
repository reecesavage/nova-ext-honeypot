<?php echo text_output($title, 'h1', 'page-head');?>
<p>
<?php echo anchor('extensions/nova_ext_honeypot/Manage/create', img($images['add']) .' '. 'Add Question', array('class' => 'image'));?>
</p>
<?php if (isset($models)): ?>
	
	
	<table class="table100 zebra">
		<tbody>
		<?php foreach ($models as $model): ?>
			<tr class="alt"> <?php $jsonDecode=json_decode($model->setting_value,true)?>
				<td>
					<strong><?=$jsonDecode['question']?></strong><br />
					<span class="gray fontSmall">
						<strong><?=implode($jsonDecode['answer'],',')?></strong>
					</span>
				</td>
				<td class="col_75 align_right">
					<a href="#" myAction="delete" myID="<?php echo $model->setting_id;?>" rel="facebox" class="image"><?php echo img($images['delete']);?></a>
					&nbsp;
					<?php echo anchor('extensions/nova_ext_honeypot/Manage/edit/'. $model->setting_id, img($images['edit']), array('class' => 'image'));?>
				</td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>
<?php else: ?>
	<?php echo text_output('No question found', 'h3', 'orange');?>
<?php endif;?>
