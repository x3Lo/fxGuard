<h1>Profile</h1>
<h4>Pseudo : <?php echo $_SESSION['userId']; ?></h4>
<h4>email : <?php echo $_SESSION['email']; ?></h4>
<h4>role : <?php echo $_SESSION['privilege']; ?></h4>
<h4>Date de création du compte : <?php echo $formattedDate; ?></h4>