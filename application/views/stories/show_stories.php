<h2><?= $backlog->backlog_name; ?></h2>
<form name="quickadd" id="quickadd" method="POST" action="/stories/quickadd">
    <label for="quickstory">Quick Add:</label>
    <input type="text" name="quickstory" id="quickstory" value="" />
    <input type="submit" name="submit" value="Add">
    <input type="hidden" name="backlog_id" id="backlog_id" value="<?= $backlog->id; ?>">
    <input type="hidden" name="current_url" id="current_url" value="<?= current_url(); ?>">
</form>
<?= $stories; ?>