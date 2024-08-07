<?php
    require_once("config.php");
    class Users extends db_object {
        protected static $db_table = "users";
        protected static $db_table_field =['username', 'password', 'first_name', 'last_name', 'user_image'] ;
        public $id;
        public $username;
        public $password;
        public $first_name;
        public $last_name;
        public $user_image;
        public $image_directory = "images";
        public $image_placeholder = "http://placehold.it/400x400&text=image";

        public function set_file($file) {
            if(empty($file) || !$file || !is_array($file)) {
                $this->errors[] = "There was no file uploaded here";
                return false;
            } elseif($file['error'] !=0) {
                $this->errors = $this->upload_errors_array[$file['error']];
                return false;
            } else {
                $this->user_image = basename($file['name']);
                $this->tmp_path = $file['tmp_name'];

            }

        }
        public function save_user_and_image() {

                if(!empty($this->errors)) {
                    return false;
                }
                if(empty($this->user_image) || empty($this->tmp_path)) {
                    $this->errors[] = "The file was not available";
                    return false;
                }
                $target_path = SITE_ROOT . DS . 'admin' . DS . $this->image_directory . DS .  $this->user_image;
                if(file_exists($target_path)) {
                    $this->errors[] ="The file {$this->user_image} was already uploaded";
                    return false;
                }

                if(move_uploaded_file($this->tmp_path, $target_path)) {

                    unset($this->tmp_path);
                    return true;

                } else {
                    $this->errors[] = "The file directory probably does not have permission";
                    return false;





            }
        }
        public function image_path_and_placeholder(){
            return empty($this->user_image)? $this->image_placeholder : $this->image_directory.DS.$this->user_image;
        }
        public function picture_path() {
            return $this->image_directory.DS.$this->user_image;

        }
        public function delete_user() {
            if($this->delete()) {
                $target_path = SITE_ROOT.DS. 'admin'.DS. $this->picture_path();
                return unlink($target_path)? true : false;  //delete the file predfined function

            }
            else {
            return false;
            }
        }




    }







?>