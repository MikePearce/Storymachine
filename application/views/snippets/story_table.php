<div id="message"></div>
<table name="storylist" id="storylist">
    <tr>
        <th>ID</th>
        <th>Theme</th>
        <th>Story</th>
        <th>Acceptance</th>
        <th>Points</th>
        <th>&nbsp;</th>
    </tr>
    <tbody class="sortable">
    <?php 
        foreach($stories AS $story): 
    ?>
        <tr class="sort" id="storyid_<?= $story->id; ?>">
            <td><?= $story->id; ?></td>
            <td><?= $story->themeName; ?></td>
            <td><?= $story->story; ?></td>
            <td>
            <? 
                foreach(json_decode($story->acceptance_criteria) AS $acc): 
                    if ($acc == '') continue;
            ?>
                <?= $acc ?><br />
            <? endforeach; ?>
            </td>
            <td><?= $story->estimate; ?></td>
            <td><? $this->load->view('snippets/edit_options', $story);?></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>