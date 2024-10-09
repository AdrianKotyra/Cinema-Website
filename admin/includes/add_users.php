<?php

validate_user_registration()


?>

<form action="" method="post" enctype="multipart/form-data">






    <div class="form-group">
        <label for="user_firstname">User Firstname</label>
        <input required type="text" class="form-control" name="user_firstname">
    </div>


    <div class="form-group">
        <label for="user_lastname">User Lastname</label>
        <input required type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <label for="user_email">User Email</label>
        <input required type="text" class="form-control" name="user_email">
    </div>
    
    <div class="form-group">
        <label for="user_password">User Password</label>
        <input required type="password" class="form-control" name="user_password">
    </div>
    <div class="form-group">
        <label for="user_age">User Age</label>
        <input required type="date" class="form-control" name="user_dob">
    </div>


    <div class="form-group">
        <label for="image">User Image</label>
        <input type="file"  name="image">
    </div>


    <div class="form-group">
       <label for="user_role">User Role</label>
       <br>
       <select required name="user_role" id="">
            <option value='Admin'>Admin</option>
            <option value='Member'>Member</option>
        </select>

    </div>
    <div class="form-group">
        <label for="user_bio">User Bio</label>
        <textarea class="form-control" name="user_bio" rows="3" >

        </textarea>
    </div>
    <div class="form-group">
        <label for="user_occupation">User Occupation</label>
        <input required type="text" class="form-control" name="user_occupation">
    </div>
    <div class="form-group">
        <label for="user_twitter">User Twitter</label>
        <input required type="text" class="form-control" name="user_twitter">
    </div>
    <div class="form-group">
        <label for="user_linkedin">User Linkedin</label>
        <input required type="text" class="form-control" name="user_linkedin">
    </div>
    <div class="form-group">
        <label for="user_facebook">User Facebook</label>
        <input required type="text" class="form-control" name="user_facebook">
    </div>


    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>

</form>