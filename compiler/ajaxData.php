<?php
    //error_reporting(E_ALL);
    //ini_set('display_errors', 1);

    header('Access-Control-Allow-Origin: *');
    if ($_GET['data'] == 'sign_in'){
?>
<style>
    *{
        box-sizing: border-box;
    }
    .signInForm {
        padding: 8px;
    }
    .inputBox{
        height: 30px;
        display: block;
        border: 1px solid;
        border-radius: 5px;
        margin: 5px 0px;
    }
    .inputBox img{
        height: 28px;
        margin: 0px 2px 0px 0px;
        padding: 5px;
    }
    .inputBox input {
        height: 26px;
        position: relative;
        bottom: 10px;
        background: #f0f0f0;
        border: 0px;
        width: calc(100% - 35px);
    }
    .button{
        margin: 15px 0px;
        width: 100%;
        text-align: center;
        display: block;
        text-decoration: none;
        color: black;
        border: 1px solid rgb(148, 148, 255);
        border-radius: 5px;
        padding: 5px;
        background: #f0f0f0;
        transition-duration: 200ms;
    }
    .button:hover{
        box-shadow: 2px 3px 5px grey;
    }        .responceContent{
            padding: 10px;
            border: 1px solid black;
            border-radius: 5px;
            text-align: center;
        }
        .green{
            background: rgb(92, 243, 92);
        }
        .red{
            background: rgb(252, 113, 113);
        }

</style>
<div class="signInForm">
    <div class="responceContent" style="display: none;"></div>
    <div class="form">
        <div class="inputBox">
            <img src="mail.png"><input type="text" name="email" placeholder="Enter your email address."> <br>
        </div>
        <div class="inputBox">
            <img src="lock.png"><input type="password" name="pass" placeholder="Enter your password."> <br>
        </div>
        <a href="javascript:void(0)" class="button" onclick="validateSignInCred()">Sign In</a>
    </div>
</div>
<?php
    }else if ($_GET['data'] == 'file_name'){
?>
<style>
    *{
        box-sizing: border-box;
    }
    .signInForm {
        padding: 8px;
    }
    .inputBox{
        height: 30px;
        display: block;
        border: 1px solid;
        border-radius: 5px;
        margin: 5px 0px;
    }
    .inputBox img{
        height: 28px;
        margin: 0px 2px 0px 0px;
        padding: 5px;
    }
    .inputBox input {
        height: 26px;
        position: relative;
        bottom: 10px;
        background: #f0f0f0;
        border: 0px;
        width: calc(100% - 35px);
    }
    .button{
        margin: 15px 0px;
        width: 100%;
        text-align: center;
        display: block;
        text-decoration: none;
        color: black;
        border: 1px solid rgb(148, 148, 255);
        border-radius: 5px;
        padding: 5px;
        background: #f0f0f0;
        transition-duration: 200ms;
    }
    .button:hover{
        box-shadow: 2px 3px 5px grey;
    }        .responceContent{
            padding: 10px;
            border: 1px solid black;
            border-radius: 5px;
            text-align: center;
        }
        .green{
            background: rgb(92, 243, 92);
        }
        .red{
            background: rgb(252, 113, 113);
        }

</style>
<div class="signInForm">
    <div class="responceContent" style="display: none;"></div>
    <div class="form">
        <div class="inputBox">
            <img src="folder.png"><input type="text" name="file_name" placeholder="Enter file name"> <br>
        </div>
        <a href="javascript:void(0)" class="button" onclick="submitFile()">Save File</a>
    </div>
</div>
<?php
    }elseif ($_GET['data'] == 'register'){
?>
<style>
    *{
        box-sizing: border-box;
    }
    .signInForm {
        padding: 8px;
    }
    .inputBox{
        height: 30px;
        display: block;
        border: 1px solid;
        border-radius: 5px;
        margin: 5px 0px;
    }
    .inputBox img{
        height: 28px;
        margin: 0px 2px 0px 0px;
        padding: 5px;
    }
    .inputBox input {
        height: 26px;
        position: relative;
        bottom: 10px;
        background: #f0f0f0;
        border: 0px;
        width: calc(100% - 35px);
    }
    .button{
        margin: 15px 0px;
        width: 100%;
        text-align: center;
        display: block;
        text-decoration: none;
        color: black;
        border: 1px solid rgb(148, 148, 255);
        border-radius: 5px;
        padding: 5px;
        background: #f0f0f0;
        transition-duration: 200ms;
    }
    .button:hover{
        box-shadow: 2px 3px 5px grey;
    }        .responceContent{
            padding: 10px;
            border: 1px solid black;
            border-radius: 5px;
            text-align: center;
        }
        .green{
            background: rgb(92, 243, 92);
        }
        .red{
            background: rgb(252, 113, 113);
        }

</style>
<div class="signInForm">
    <div class="responceContent" style="display: none;"></div>
    <div class="form">
        <div class="inputBox">
            <img src="user.png"><input type="text" name="username" placeholder="Enter your name."> <br>
        </div>
        <div class="inputBox">
            <img src="mail.png"><input type="text" name="email" placeholder="Enter your email address."> <br>
        </div>
        <div class="inputBox">
            <img src="lock.png"><input type="password" name="pass" placeholder="Enter your password."> <br>
        </div>
        <a href="javascript:void(0)" class="button" onclick="register()">Register</a>
    </div>
</div>
<?php
    }else if ($_GET['data'] == 'confirm_delete'){
?>
    <style>
        .button{
        margin: 15px 0px;
        width: 70px;
        text-align: center;
        display: inline-block;
        text-decoration: none;
        color: black;
        border: 1px solid rgb(148, 148, 255);
        border-radius: 5px;
        padding: 5px;
        background: #f0f0f0;
        transition-duration: 200ms;
    }.button:hover{
        box-shadow: 2px 3px 5px grey;
    }.buttons{
        width: fit-content;
        margin: auto;
    }
    </style>
    <div class="buttons">
        <a href="javascript:void(0)" class="button" onclick="deleteFile()">Yes</a>
        <a href="javascript:void(0)" class="button" onclick="closeWindow()">No</a>
    </div>
<?php
    }
?>