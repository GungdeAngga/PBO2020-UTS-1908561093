<?php

include_once "../loadpage.php";

if (isset($_POST['post-form'])) {
    $commentData = $_POST['isiMasukan'];
    if (!empty($commentData)) {
        $comment = new Comment(null, $commentData);
        $result = $comment->save();
        echo $result;
        if ($result) {
            header("Location: ../");
        } else {
            header("Location: ../?e=fatal error");
        }
    } else {
        header("Location: ../?e=masukkan tidak boleh kosong");
    }
}

if (isset($_POST['form-isiMasukan'])) {
    $comment = $_POST['isiMasukan'];
    $id = $_POST['form-isiMasukan'];
    if (!empty($id) && !empty($comment)) {
        $oldComment = Comment::getComment($id);

        $oldComment->setCommentData($comment);
        $result = $oldComment->save();

        if ($result) {
            header("Location: ../");
        } else {
            header("Location: ../?e=fatal error");
        }
    } else {
        header("Location: ../?e=masukkan tidak boleh kosong");
    }
}

if (isset($_POST['isiMasukan-id'])) {
    $id = $_POST['isiMasukan-id'];
    if (!empty($id)) {
        $comment = Comment::getComment($id);
        $result = $comment->delete();

        if ($result) {
            header("Location: ../");
        } else {
            header("Location: ../?e=database error");
        }
    } else {
        header("Location: ../?e=fatal error");
    }
}
