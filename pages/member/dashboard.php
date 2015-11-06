<?php session_start(); ?>

<div id="member-page-container">
	<div id="member-page" class="nextShortTransition animFadeInLeftAlt transition-exclude">


		<h1 class="page-header">Dashboard</h1>
		<table class="styled">
			<caption>User Information</caption>
			<tr><td>Username : </td><td><?php echo $_SESSION["user"]; ?></td></tr>
			<tr><td>Email : </td><td><?php echo  $_SESSION["email"]; ?></td></tr>
			<tr><td>Group : </td><td><?php echo $_SESSION["group"]; ?></td></tr>
		</table>
		<table class="styled">
			<caption>Lessons Status</caption>
			<tr><td>Lessons Completed : </td><td>0</td></tr>
			<tr><td>XP Earned : </td><td>0</td></tr>
			<tr><td>Current Level : </td><td>Beginner</td></tr>
		</table>

	</div>
</div>
