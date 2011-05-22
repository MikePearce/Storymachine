<form name='new_backlog' id='new_backlog' method='POST' action="/backlogs/create">
<?php echo form_error('name'); ?>
<label for="name">Backlog name:</label>
<input type="text" name="name" id="name" value="<?php echo set_value('name'); ?>" />
<input type="submit" name="submit" id="submit" value="Add backlog" />
</form>