<h2>Your backlogs</h2>
<p>
    Below is a list of your backlogs, please choose one, or <a href='/backlogs/create'>create a new one</a>.
</p>

<ul class="backlogList">
<?php foreach ($backlogs AS $backlog): ?>
    <li>
        <a href="/backlogs/view/<?= url_title($backlog->backlog_name); ?>">
            <?= $backlog->backlog_name; ?>
        </a>
    </li>
<?php endforeach;?>
</ul>