<?php require('dbconnect.php');?>
<?php require('header.php');?>
<?php
if (isset($_REQUEST['id']) && is_numeric(($_REQUEST['id']))) {
    $id=$_REQUEST['id'];
    $memos=$db->prepare('DELETE FROM memos WHERE id=?');
    $memos->execute(array($id));
}
?>
<pre>
    <p>メモを削除しました</p>
    <p><a href="index.php">戻る</a></p>
</pre>
</main>
<?php require('footer.php');
