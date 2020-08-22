<?php require('dbconnect.php');?>
<?php require('header.php');?>
<?php
if (isset($_REQUEST['id']) && is_numeric(($_REQUEST['id']))) {
    $id=$_REQUEST['id'];
    $memos=$db->prepare('SELECT * FROM memos WHERE id=?');
    $memos->execute(array($id));
    $memo=$memos->fetch();
}
?>
<form action="update_do.php" method="post">
    <input type="hidden" name="id" value="<?php print($id); ?>">
    <textarea name="memo" cols="50" rows="10"
        placeholder="自由にメモを残してください"><?php print($memo['memo']) ?></textarea><br />
    <button type="submit">登録する</button>
</form>
<?php require('footer.php');
