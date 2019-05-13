<?php 
session_start();
$page_title = 'About BestPet';
if(isset($_SESSION['token'])) {
    include('includes/header_in.html');
}else{
    include('includes/header.html');
}
?>

<div class="card" style="text-align: center;">
    <h2> License Info</h2>
<p>
License by CodexWorld.com </br>
Author: CodexWorld</br>
Author URL: http://www.codexworld.com</br>
License: Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International (CC BY-NC-ND 4.0)</br>
License URL: http://creativecommons.org/licenses/by-nc-nd/4.0/
</p>
</div>

