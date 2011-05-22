<ul class="hidePrint editOptions">
    <li>
        <a href="/stories/printer/<?= $id; ?>">print</a> |
    </li>
    <li>
        <a 
            href="/stories/delete/<?= $id; ?>" 
            onClick="return confirm('Are you sure you want to delete this?');">
            delete</a> |
    </li>
    <li>
        <a href="/stories/edit/<?= $id; ?>">edit</a> |
    </li>
    <? if (!isset($done)) : ?>
    <li>
        <a href="/stories/markdone/<?= $id; ?>/TRUE">done</a>
    </li>
    <? else: ?>
    <li>
        <a href="/stories/markdone/<?= $id; ?>/FALSE">not done</a>
    </li>
    <? endif; ?>
</ul>