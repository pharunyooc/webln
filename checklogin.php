<?php 
session_start();
        if(isset($_POST['username'])){
                  include("condb.php");
                  $username = $_POST['username'];
                  $password = $_POST['password'];
                            
              


                  $sql="SELECT * FROM login_ln 
                  WHERE  username='".$username."' 
                  AND  password='".$password."' ";
                 $result = mysqli_query($con,$sql);
				
                 if(mysqli_num_rows($result)==1){

                     $row = mysqli_fetch_array($result);

                     $_SESSION["UserID"] = $row["ID"];
                     $_SESSION["name"] = $row["name"];
                     $_SESSION["level"] = $row["level"];
                     $_SESSION["department"] = $row["department"];

                     if($_SESSION["department"]=="mng"){ //ถ้าเป็น mng ให้กระโดดไปหน้า manage.html

                       Header("Location:  groupmember/manage.php");

                     }
                     if($_SESSION["department"]=="News"){ //ถ้าเป็น mng ให้กระโดดไปหน้า manage.html

                      Header("Location:  news/form_addnews.php");

                    }

                     if ($_SESSION["department"]=="dt"){  //ถ้าเป็น dt ให้กระโดดไปหน้า dental.html
                       Header("Location:  workgroup/dental.php");
                     }

                     if ($_SESSION["department"]=="acd"){  //ถ้าเป็น acd ให้กระโดดไปหน้า accident.php
                      Header("Location: workgroup/accident.html");

                    }

                    if ($_SESSION["department"]=="opd"){  //ถ้าอยู่แผนก opd ให้กระโดดไปหน้า opd.php
                      Header("Location: groupmember/opd.php");

                    }


                 }else{
                   echo "<script>";
                       echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                       echo "window.history.back()";
                   echo "</script>";

                 }

       }else{


            Header("Location: form.php"); //user & password incorrect back to login again

       }
?>
