<?php

if (!empty($_POST("id_post"))) {
    @$id_post = $_POST["id_post"];
    @$sql = "SELECT * FROM post_like WHERE id_post = $id_post and id_user = $id_user";
    @$result = @$conn_post->query($sql);
    if ($result->num_rows > 0) {
        //If it already liked the post the code in here is displayed
    } else {
        //If it doesn't liked the post the code in here is displayed
        $sql = "INSERT INTO post_like(id_post, id_user, user_name)
         VALUES ($id_post, $id_user, 'Sclient_username')";
        if ($conn_post->query($sql) == true) {
            echo "Your are liked the post";
        } else {
            echo "error";
        }
    }
}
