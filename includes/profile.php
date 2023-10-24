<?php
echo '<div class="profile">';
echo '<center>';
$row = mysqli_fetch_assoc($profilequery);
// Name and Nickname
if(!empty($row['user_nickname']))
    echo $row['user_firstname'] . ' ' . $row['user_lastname'] . ' (' . $row['user_nickname'] . ')';
else
    echo $row['user_firstname'] . ' ' . $row['user_lastname'];
echo '<br>';
// Profile Info & View
$width = '168px';
$height = '168px';
include 'includes/profile_picture.php';
echo '<br>';
// Gender
if($row['user_gender'] == "M")
    echo 'Hombre';
else if($row['user_gender'] == "F")
    echo 'Mujer';
echo '<br>';
// Status
if(!empty($row['user_status'])){
    if($row['user_status'] == "S")
        echo 'Soltero(a)';
    else if($row['user_status'] == "E")
        echo 'Comprometido(a)';
    else if($row['user_status'] == "M")
        echo 'Casado(a)';
    echo '<br>';
}
// Birthdate
echo $row['user_birthdate'];
// Additional Information
if(!empty($row['user_hometown'])){
    echo '<br>';
    echo $row['user_hometown'];
}
if(!empty($row['user_about'])){
    echo '<br>';
    echo $row['user_about'];
}
// Friendship Status
if($flag == 1){
    echo '<br>';
    if(isset($row['friendship_status'])) {
        if($row['friendship_status'] == 1){
            echo '<form method="post">';
            echo '<input type="submit" value="Amigos" disabled="disabled" id="special">';
            echo '</form>';
        } else if ($row['friendship_status'] == 0){
            echo '<form method="post">';
            echo '<input type="submit" value="Solicitud pendiente" disabled="disabled" id="special">';
            echo '</form>';
        }
    } else {
        echo '<form method="post">';
        echo '<input type="submit" value="Enviar solicitud" name="request">';
        echo'</form>';
    }
}

echo '<center>'; 
echo'</div>';

$query4 = mysqli_query($conn, "SELECT * FROM user_phone WHERE user_id = {$row['user_id']}");
if(!$query4){
    echo mysqli_error($conn);
}
if(mysqli_num_rows($query4) > 0){
    echo '<br>';
    echo '<div class="profile">';
    echo '<center class="changeprofile">'; 
    echo 'Phones:';
    echo '<br>';
    while($row4 = mysqli_fetch_assoc($query4)){
        echo $row4['user_phone'];
        echo '<br>';
    }
    echo '</center>';
    echo '</div>';
}

?>