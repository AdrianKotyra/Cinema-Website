<?php

validate_staff()


?>

<form action="" method="post" enctype="multipart/form-data">






    <div class="form-group">
        <label for="user_firstname">Staff Firstname</label>
        <input required type="text" class="form-control" name="staff_firstname">
    </div>


    <div class="form-group">
        <label for="user_lastname">Staff Lastname</label>
        <input required type="text" class="form-control" name="staff_lastname">
    </div>

    
    <div class="form-group">
        <label for="staff_vocation">Staff Vocation</label>
        <input required type="text" class="form-control" name="staff_vocation">
    </div>
    <div class="form-group">
        <label for="staff_description">Staff Description</label>
        <input required type="text" class="form-control" name="staff_description">
    </div>
   

    <div class="form-group">
        <label for="image">Staff Image</label>
        <input type="file"  name="image">
    </div>


   

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add_staff" value="Add Staff">
    </div>

</form>