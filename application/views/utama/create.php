<main>
	
     <div class="container">
		<h1 class="py-3"><?php echo $title; ?></h1>

		<?php echo validation_errors(); ?>

		<?php echo form_open('landing/create'); ?>
            <fieldset>
                <legend>Form</legend>
                <ul>
                   <p>
                        <label for="lat"><small>Latitude</small></label>
                        <input type="float" name="lat" /><br />
                   </p>
                   <p>
                        <label for="lon"><small>Longitude</small></label>
                        <input type="float" name="lon" /><br />
                   </p>
                        <input type="submit" name="submit" value="Posting" />
                </ul>   
            </fieldset>
		</form>
	</div>
     
</main>
