<?php

namespace app\src;

use PDO;
use PDOException;
use app\src\Message;


class User
{

    public $pdo    = '';
    public $dbUser = 'root';
    public $dbPass = '';

    public $id        = '';
    public $title ='';
    public $userID    = '';
    public $uniqueID  = '';
    public $userName  = '';
    public $password  = '';
    public $md5Pass   = '';
    public $email     = '';

    public $firstName        = '';
    public $lastName         = '';
    public $profilePic       = '';
    public $personalPhone    = '';
    public $homePhone        = '';
    public $officePhone      = '';
    public $currentAddress   = '';
    public $permanentAddress = '';

    public $aTitle       = '';
    public $aSubTitle    = '';
    public $ahtmlDetails = '';
    public $ahtmlSummary = '';
    public $aDetails     = '';
    public $aSummary     = '';
    public $aImage       = '';


    public $category_name='';

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=owncms', $this->dbUser, $this->dbPass);

        } catch (PDOException $e) {
            echo $e->getMessage();

        }
    }

    public function prepare($data = array())
    {
        if (is_array($data) && array_key_exists('category_name', $data)) {
            $this->category_name = $data['category_name'];
        }
        if (is_array($data) && array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }
        if (is_array($data) && array_key_exists('title', $data)) {
            $this->title = $data['title'];
        }
        if (is_array($data) && array_key_exists('user_id', $data)) {
            $this->userID = $data['user_id'];
        }

        if (is_array($data) && array_key_exists('unique_id', $data)) {
            $this->uniqueID = $data['unique_id'];
        }

        if (is_array($data) && array_key_exists('username', $data)) {
            $this->userName = $data['username'];
        }

        if (is_array($data) && array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }

        if (is_array($data) && array_key_exists('password', $data)) {
            $this->password = $data['password'];
            $this->md5Pass = md5($data['password']);
        }



        if (is_array($data) && array_key_exists('first_name', $data)) {
            $this->firstName = $data['first_name'];
        }

        if (is_array($data) && array_key_exists('last_name', $data)) {
            $this->lastName = $data['last_name'];
        }

        if (is_array($data) && array_key_exists('profile_pic', $data)) {
            $this->profilePic = $data['profile_pic'];
        }

        if (is_array($data) && array_key_exists('personal_phone', $data)) {
            $this->personalPhone = $data['personal_phone'];
        }

        if (is_array($data) && array_key_exists('home_phone', $data)) {
            $this->homePhone = $data['home_phone'];
        }

        if (is_array($data) && array_key_exists('office_phone', $data)) {
            $this->officePhone = $data['office_phone'];
        }

        if (is_array($data) && array_key_exists('current_address', $data)) {
            $this->currentAddress = $data['current_address'];
        }

        if (is_array($data) && array_key_exists('permanent_address', $data)) {
            $this->permanentAddress = $data['permanent_address'];
        }




        if (is_array($data) && array_key_exists('title', $data)) {
            $this->aTitle = trim($data['title']);
            $this->aSubTitle = substr(trim($data['title']), 0, 10);
        }

        if(is_array($data) && array_key_exists('image_name', $data)) {
            $this->aImage = $data['image_name'];
        }

        if (is_array($data) && array_key_exists('html_details', $data)) {
            $this->ahtmlDetails = trim($data['html_details']);
            $this->ahtmlSummary = substr(trim($data['html_details']), 0, 311);

            $this->aDetails = strip_tags($this->ahtmlDetails);
            $this->aSummary = strip_tags($this->ahtmlSummary);
        }

        return $this;
    }

    public function register()
    {
        try {

            //validation for empty fields
            if (empty($this->userName) || empty($this->email) || empty($this->password)) {
                    Message::message('<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert"
                    aria-hidden="true">&times;</button>
                    Fields must not be empty!!!
                    </div>');

            }

            //validation for username
            elseif (preg_match('/\W/', $this->userName)) {
                    Message::message('<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert"
                    aria-hidden="true">&times;</button>
                    The username must not contain white space or special characters!!!
                    </div>');

            }

            //validation for email
            elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                    Message::message('<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert"
                    aria-hidden="true">&times;</button>
                    This is not a valid email address!!!
                    </div>');

            }else {
                //validation for existing user
                $ckeckUser = $this->pdo->prepare("SELECT * FROM `users`
                WHERE username = ? OR email = ?");
                $ckeckUser->execute(array($this->userName, $this->email));
                $row = $ckeckUser->rowCount();

                if ($row == 0) {
                    //successfully data insert
                    $uniqueID = uniqid();
                    $stmt = $this->pdo->prepare("INSERT INTO users
                    (username, email, password, unique_id, created_at)
                    VALUES (?, ?, ?, ?, NOW())");

                    //VALUES(:username, :email, :password) will use when bindParam()
                    //$stmt->bindParam(':username', $this->userName);
                    //$stmt->bindParam(':email', $this->email);
                    //$stmt->bindParam(':password', $this->password);
                    //$stmt->bindParam(':uniqueID', $uniqueID);

                        if ($stmt->execute(array(
                            "$this->userName",
                            "$this->email",
                            "$this->password",
                            "$uniqueID"
                        ))) {

                            Message::message('<div class="alert alert-success
                            alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert"
                            aria-hidden="true">&times;</button>
                            Your registration was successful. Now redirecting to login                                 page...
                            </div>');
                            header("refresh:3;../../login.php");


                            $lastId = $this->pdo->lastInsertId();

                            $stmt = $this->pdo->prepare("INSERT INTO profiles (user_id)
                            VALUES (?)");
//                            $stmt2 = $this->pdo->prepare("INSERT INTO articles (users_id)
//                            VALUES (?)");

                            //$stmt->bindParam(':id', $lastId);
                            //$stmt2->bindParam(':id', $lastId);

                            $stmt->execute(array("$lastId"));
//                            $stmt2->execute(array("$lastId"));


                        } else {
                        Message::message('<div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">&times;</button>
                        There was a problem while registering!!!
                        </div>');

                        }

                } else {
                    Message::message('<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert"
                    aria-hidden="true">&times;</button>
                    Username/email address already exists!!!
                    </div>');

                }

            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function login()
    {
        try {

            //validation for empty fields
            if (empty($this->email) || empty($this->password)) {
                Message::message('<div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">&times;</button>
                        Fileds must be not empty!!!
                        </div>');

            } else {
                $stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE email =? AND password =? ");
                $stmt->execute(array($this->email, $this->password));
                $userData = $stmt->fetch();
                $row = $stmt->rowCount();

                if ($row == 1) {
                    if (!isset($_SESSION)) {
                        session_start();
                    }

                    $_SESSION['login'] = true;
                    $_SESSION['uid'] = $userData['id'];
                    $_SESSION['uname'] = $userData['username'];
                    $_SESSION['uemail'] = $userData['email'];
                    $_SESSION['uniqueid'] = $userData['unique_id'];
//                    $_SESSION['createdAt'] = $userData['created_by'];

                    Message::message('<div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">&times;</button>
                        Login successfull
                        </div>');
                    //return true;
                    header('refresh:1;../../admin/index.php');
                }
                else {
                    Message::message('<div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">&times;</button>
                        Email or password did not match!!!
                        </div>');
                    header('refresh:2;../../login.php');

                }

            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function getSession()
    {
        return @$_SESSION['login'];
    }


    public function getAllUser()
    {
        $stmt = $this->pdo->prepare("SELECT *, DATE_FORMAT(created_at, '%d-%b-%Y / %h:%i %p') AS signUpDate FROM users");
        $stmt->execute();
        $allUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $allUsers;
    }

    public function viewProfileBySessionID($sID)
    {
        $stmt = $this->pdo->prepare("SELECT p.first_name, p.last_name, u.username, u.email, p.personal_phone, p.home_phone, p.office_phone, p.current_address, p.permanent_address FROM users u JOIN profiles p ON u.id = p.user_id WHERE u.id = :id");

        $stmt->execute(array(':id' => $sID));
        $singleUser = $stmt->fetch(PDO::FETCH_ASSOC);

        return $singleUser;

    }



    public function editProfileBySessionID($sID, $sUID)
    {
        $stmt = $this->pdo->prepare("SELECT p.first_name, p.last_name, p.profile_pic, u.id, u.username, u.email, p.personal_phone, p.home_phone, p.office_phone, p.current_address, p.permanent_address FROM users u JOIN profiles p ON u.id = p.user_id WHERE u.id = :id AND u.unique_id = :suID");

        $stmt->execute(array(
            ':id' => $sID,
            ':suID' => $sUID));

        $singleUser = $stmt->fetch(PDO::FETCH_ASSOC);

        return $singleUser;
    }

    public function viewProfileByUniqueID()
    {
        $stmt = $this->pdo->prepare("SELECT p.first_name, p.last_name, p.profile_pic, u.id, u.username, u.email, p.personal_phone, p.home_phone, p.office_phone, p.current_address, p.permanent_address FROM users u JOIN profiles p ON u.id = p.user_id WHERE u.unique_id = :uID");

        $stmt->execute(array(
            ':uID' => $this->uniqueID
        ));

        $singleUser = $stmt->fetch(PDO::FETCH_ASSOC);

        return $singleUser;

    }

    public function editProfileByUniqueID()
    {
        $stmt = $this->pdo->prepare("SELECT p.user_id, p.first_name, p.last_name, p.profile_pic, u.id, u.unique_id, u.username, u.email, p.personal_phone, p.home_phone, p.office_phone, p.current_address, p.permanent_address FROM users u JOIN profiles p ON u.id = p.user_id WHERE u.unique_id = :uID");

        $stmt->execute(array(
            ':uID' => $this->uniqueID
        ));

        $singleUser = $stmt->fetch(PDO::FETCH_ASSOC);

        return $singleUser;
    }

    public function updateProfileByID()
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE profiles SET first_name = '".$this->firstName."', last_name = '".$this->lastName."', personal_phone = $this->personalPhone, home_phone = $this->homePhone, office_phone = $this->officePhone, current_address = '".$this->currentAddress."', permanent_address = '".$this->permanentAddress."' WHERE user_id = :id");

            $stmt->bindParam(':id', $this->userID);

            if ($stmt->execute()) {
                Message::message('<div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">&times;</button>
                        Profile updated successfully
                        </div>');
                $stmt->closeCursor();

            } else {
                Message::message('<div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">&times;</button>
                        There was problem while updating profile
                        </div>');

            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }


    }


    public function isAdmin($id)
    {
        $one = 1;
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE is_admin =? AND id =?");
        $stmt->execute(array($one, $id));
        $stmt->fetch(PDO::FETCH_ASSOC);
        $row = $stmt->rowCount();

        if ($row == 1) {
            return true;

        } else {
            return false;

        }

    }


    public function logOut()
    {
        try {
            $_SESSION['login'] = false;
            unset($_SESSION['uid']);
            unset($_SESSION['uname']);
            unset($_SESSION['uemail']);
            unset($_SESSION['uniqueid']);

            session_destroy();
            Message::message('<div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">&times;</button>
                        Logout Successfully
                        </div>');
            header('refresh:2;login.php');

        } catch (PDOException $e) {
            $e->getMessage();
        }

    }

    /**
     * @param $sID
     * this sID is session id
     */
    public function postArticle($sID)
    {
//        echo $this->aImage;
//        exit();

        if (empty($this->aImage)) {
            $stmtc = $this->pdo->prepare("INSERT INTO `categories` (`id`, `title`) VALUES (NULL, '".$this->category_name."')");
            $stmtc->execute();
            $stmt = $this->pdo->prepare("INSERT INTO articles (users_id, title, sub_title,
                summary, html_summary, details, html_details, created_at)
                VALUES ((SELECT id FROM users WHERE id = :id),
                :title, :sub_title, :summary, :html_summary, :details, :html_details,
                NOW())");

            $stmt->bindParam(':id', $sID);
            $stmt->bindParam(':title', $this->aTitle);
            $stmt->bindParam(':sub_title', $this->aSubTitle);
            $stmt->bindParam(':summary', $this->aSummary);
            $stmt->bindParam(':html_summary', $this->ahtmlSummary);
            $stmt->bindParam(':details', $this->aDetails);
            $stmt->bindParam(':html_details', $this->ahtmlDetails);

            if ($stmt->execute()) {

                $aLastID = $this->pdo->lastInsertId();

//                echo $aLastID;

                $stmt2 = $this->pdo->prepare("INSERT INTO articles_menu_mapping (article_id) VALUES (?)");
                $stmt3 = $this->pdo->prepare("INSERT INTO articles_categories_mapping (article_id) VALUES (?)");

                $stmt2->execute(array("$aLastID"));
                $stmt3->execute(array("$aLastID"));

                Message::message('<div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">&times;</button>
                        Article posted successfully
                        </div>');

            } else {
                Message::message('<div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">&times;</button>
                        Cannot post article
                        </div>');

            }

        } else {
          $stmtc = $this->pdo->prepare("INSERT INTO `categories` (`id`, `title`) VALUES (NULL, '".$this->category_name."')");
          $stmtc->execute();

            $stmt2 = $this->pdo->prepare("INSERT INTO images (image_name, created_at) VALUES (:iName, NOW())");

            $stmt2->bindParam(':iName', $this->aImage);


            $stmt = $this->pdo->prepare("INSERT INTO articles (users_id, title, sub_title,
                summary, html_summary, details, html_details, created_at)
                VALUES ((SELECT id FROM users WHERE id = :id),
                :title, :sub_title, :summary, :html_summary, :details, :html_details,
                NOW())");

            $stmt->bindParam(':id', $sID);
            $stmt->bindParam(':title', $this->aTitle);
            $stmt->bindParam(':sub_title', $this->aSubTitle);
            $stmt->bindParam(':summary', $this->aSummary);
            $stmt->bindParam(':html_summary', $this->ahtmlSummary);
            $stmt->bindParam(':details', $this->aDetails);
            $stmt->bindParam(':html_details', $this->ahtmlDetails);


            if ($stmt2->execute() && $stmt->execute()) {

                $con=mysqli_connect("localhost","root","","owncms");
                $ai = mysqli_query($con,'SELECT MAX(id) as id FROM articles');
                $ari = mysqli_fetch_assoc($ai);
                $arti = $ari['id'];

                $ii = mysqli_query($con,'SELECT MAX(id) as id FROM images');
                $iii = mysqli_fetch_assoc($ii);
                $irti = $iii['id'];

                mysqli_query($con,"INSERT INTO `articles_images_mapping` (`id`, `articles_id`, `images_id`) VALUES (NULL, $arti, $irti)");

                // $stmt6 = $this->pdo->prepare("INSERT INTO articles_images_mapping (articles_id, images_id)");
                //
                // $stami = $this->pdo->prepare("INSERT INTO `articles_images_mapping` (`id`, `articles_id`, `images_id`) VALUES (NULL, 12, 13)");
                // $stami->execute();
                Message::message('<div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">&times;</button>
                        Article posted successfully
                        </div>');


            } else {
                Message::message('<div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">&times;</button>
                        Cannot post article
                        </div>');
            }

        }



    }


    public function showArticles()
    {
        $stmt = $this->pdo->prepare("SELECT a.id, u.username, a.title, a.html_summary, a.html_details, a.created_at, images.image_name
                                     FROM users u
                                     INNER JOIN articles a
                                        ON u.id = a.users_id
                                     LEFT JOIN articles_images_mapping
                                        ON articles_images_mapping.articles_id = a.id
                                     LEFT JOIN images
    	                                  ON images.id = articles_images_mapping.images_id
                                     ORDER BY a.`created_at` DESC");
        $stmt->execute();
        $allPost = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $allPost;
    }

    public function SinglePostsRakib($data='')
    {
      $this->id = $data;
      $stmt = $this->pdo->prepare("SELECT a.id, u.username, a.title, a.html_summary, a.html_details, a.created_at FROM users u JOIN articles a ON u.id = a.users_id WHERE a.id = ".$this->id);
      $stmt->execute();
      $singlepost = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $singlepost;
    }

    public function fImageRakib($data='')
    {
      $this->id = $data;
      $stmt = $this->pdo->prepare("SELECT articles_images_mapping.articles_id, articles_images_mapping.images_id, images.image_name
                                    FROM articles_images_mapping
                                    INNER JOIN images
                                    on articles_images_mapping.images_id= images.id
                                    WHERE articles_images_mapping.articles_id =
                                    ".$this->id);
      $stmt->execute();
      $singleImage = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $singleImage;
    }

    public function insertCategoryName(){
      $stmt = $this->pdo->prepare("INSERT INTO `categories` (`id`, `title`) VALUES (NULL, '".$this->category_name."')");
      $stmt->execute();
      header('location:category-new.php');
    }

    public function allCategory(){
      $stmt = $this->pdo->prepare("SELECT * FROM `categories`");
      $stmt->execute();
      $allCategory = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $allCategory;
    }

    public function delCategory($data=''){
      $this->id = $data;
      $stmt = $this->pdo->prepare("DELETE FROM `categories` WHERE `categories`.`id` =" .$this->id);
      $stmt->execute();
      header('location:category-list.php');
    }
    public function getSingleCategory($data=''){
      $this->id = $data;
      $stmt = $this->pdo->prepare("SELECT * FROM `categories` WHERE id = ".$this->id);
      $stmt->execute();
      $singleCategory = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $singleCategory;
    }
    public function updateCategory(){
      $stmt = $this->pdo->prepare("UPDATE `categories` SET `title` = '".$this->title."' WHERE `categories`.`id` =".$this->id);
      $stmt->execute();
      header('location:category-list.php');
    }
    public function allcategorydata(){
      $stmt = $this->pdo->prepare("SELECT id,title FROM `categories`");
      $stmt->execute();
      $singleCategory = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $singleCategory;
    }


}
