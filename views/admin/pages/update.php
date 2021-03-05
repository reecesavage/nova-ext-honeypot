<?php echo text_output($title, 'h1', 'page-head');?>


<p>
<?php echo anchor('extensions/nova_ext_anti_spam_questions/Manage/index','« Back to Anti Spam Questions', array('class' => 'image'));?>
</p>





<?php echo form_open("extensions/nova_ext_anti_spam_questions/Manage/edit/$model->setting_id");?>

<?php $jsonDecode=json_decode($model->setting_value,true)?>
	        <p>
				<kbd>Question</kbd>
				<textarea name="question" required rows="4"><?=isset($jsonDecode['question'])?$jsonDecode['question']:''?></textarea>	
			</p>
           
				  <div class="row">
				  	<p>
				  		<kbd>Answer</kbd>
				  	</p>

                    <?php foreach ($jsonDecode['answer'] as $key=>$answer){
                       $i=rand(0000,1111);
                     ?>

       
				  	<div class="answer" id="answer_<?=$i?>" data-id="<?=$i?>">
             	   <div class="col s12 m10 l10">              
                   
				   <input type="text" name="answer[]" required value="<?=$answer?>">
			     
             	   </div>
                <?php if($key==0){ ?>
                	 <div class="col s12 m2 l2">
             
                  <a class="add-more">Add Rows</a>
                
             	</div>
             <?php  } else { ?>
                  <div class='col s12 m2 l2'>
                  <a class='remove-more' data-id="<?=$i?>">Remove Rows</a>
                 </div>
             <?php } ?>
             	
             </div>

             <?php } ?>



             	<div class="append_html"></div>

             	</div>

             	<br>
			<button name="submit" type="submit" class="button-main" value="Submit"><span>Submit</span></button>

            
      
<?php echo form_close(); ?>