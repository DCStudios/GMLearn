<?php
	session_start();
	$CWD="../..";
	require_once "$CWD/php/sqlite.php";
	$_exercice_tracking = "l01_e01";
	$can_unlock = false;

	if( !isset( $_SESSION["loggedIn"] ) ) { ?>

<div id="member-page-container">
	<div id="member-page" class="nextShortTransition animFadeInLeftAlt transition-exclude">
		<div class="message">
			<h1 class="message-header">Access Denied</h1>
			<p class="message-body">You do not have access to this page directly</p>
		</div>
	</div>
</div>

<?php }

	else {

		$statement = $sql -> prepare( "
			SELECT tracking.id
			FROM tracking
			INNER JOIN users ON users.userid = tracking.userid
			WHERE
				users.userid = :uid AND
				exerciceid = :eid;
		");
		$statement -> bindValue( ":uid", $_SESSION["userid"] );
		$statement -> bindValue( ":eid", $_exercice_tracking );
		$result = $statement -> execute() -> fetchArray( SQLITE3_ASSOC );

		if( $result === FALSE || $result === null ) {
			$can_unlock = true;
		}
		else {
			$can_unlock = false;
		}
?>

<div id="member-page-container">
	<div id="member-page" class="nextShortTransition animFadeInLeftAlt transition-exclude">

		<div class="message">
			<h1 class="message-header">Your first lesson</h1>
			<p class="message-body">
				Now that you know about all the GameMaker's different variable types, it is time to test if
				you actually understood them properly.
			</p>
			<p class="message-body">
				I offer you this small test which you need to pass to unlock the next lesson. I can't let you
				continue if you don't understand variables because they are the very basics you need to be able
				to code properly.
			</p>
		</div>

		<div class="message">
			<h1 class="message-header">Note on exercices</h1>
			<p class="message-body">
				To pass an exercice, you need to have 100% answers right.
				The answers <i>will not be given</i> and the <i>errors will not be shown</i>.
				Make sure you study carefully the lessons and then try to complete the exercices!
				Don't worry, I will <i>never</i> make "bonus" questions that needs special knowledge.
				The test are here to help you, not to make your life harder.
			</p>
			<p class="message-body">
				Most exercices will be multiple choices questions, but sometimes I will include some
				coding boxes where you can do whatever you like, as long as it produces the right answer.
				For this exercice though, there are only multiple choices questions.
			</p>
		</div>

		<div class="message">
			<h1 class="message-header">Question 1</h1>
			<p class="message-body question">
				What variable in GameMaker cannot be accessed outside the scope where it was created?
			</p>
			<div class="message-body">
				<ul class="indexList choices">
					<li><input id="q1c1" type="radio" name="q1"><label for="q1c1">Instance Variable</label></li>
					<li><input id="q1c2" type="radio" name="q1"><label for="q1c2">Local Variable</label></li>
					<li><input id="q1c3" type="radio" name="q1"><label for="q1c3">Global Variable ( via object )</label></li>
					<li><input id="q1c4" type="radio" name="q1"><label for="q1c4">Global Variable ( via definition )</label></li>
					<li><input id="q1c5" type="radio" name="q1"><label for="q1c5">Enum Variable</label></li>
					<li><input id="q1c6" type="radio" name="q1"><label for="q1c6">Macro Variable</label></li>
				</ul>
			</div>
		</div>

		<div class="message">
			<h1 class="message-header">Question 2</h1>
			<p class="message-body question">
				In the following piece of code, what is the type of the '<i>CHAR_SPECIALITY</i>' variable?
			</p>
			<pre class="line-numbers"><code class="language-clike">// Get the speciality of the character 3
var speciality = characters[ 3, CHAR_SPECIALITY ];</code></pre>
			<span class="code-description">Can you guess <i>CHAR_SPECIALITY</i>'s type?</span>
			<div class="message-body">
				<ul class="indexList choices">
					<li><input id="q2c1" type="radio" name="q2"><label for="q2c1">Instance Variable</label></li>
					<li><input id="q2c2" type="radio" name="q2"><label for="q2c2">Local Variable</label></li>
					<li><input id="q2c3" type="radio" name="q2"><label for="q2c3">Global Variable ( via object )</label></li>
					<li><input id="q2c4" type="radio" name="q2"><label for="q2c4">Global Variable ( via definition )</label></li>
					<li><input id="q2c5" type="radio" name="q2"><label for="q2c5">Enum Variable</label></li>
					<li><input id="q2c6" type="radio" name="q2"><label for="q2c6">Macro Variable</label></li>
				</ul>
			</div>
		</div>

		<div class="message">
			<h1 class="message-header">Question 3</h1>
			<p class="message-body question">
				To define an instance variable, we use the keyword '<i>var</i>' in front.
			</p>
			<div class="message-body">
				<ul class="indexList choices">
					<li><input id="q3c1" type="radio" name="q3"><label for="q3c1">That is correct</label></li>
					<li><input id="q3c2" type="radio" name="q3"><label for="q3c2">That's not right</label></li>
				</ul>
			</div>
		</div>

		<div class="message">
			<h1 class="message-header">Question 4</h1>
			<p class="message-body question">
				What variable in GameMaker is preceded by the <i>global.</i> prefix?
			</p>
			<div class="message-body">
				<ul class="indexList choices">
					<li><input id="q4c1" type="radio" name="q4"><label for="q4c1">Instance Variable</label></li>
					<li><input id="q4c2" type="radio" name="q4"><label for="q4c2">Local Variable</label></li>
					<li><input id="q4c3" type="radio" name="q4"><label for="q4c3">Global Variable ( via object )</label></li>
					<li><input id="q4c4" type="radio" name="q4"><label for="q4c4">Global Variable ( via definition )</label></li>
					<li><input id="q4c5" type="radio" name="q4"><label for="q4c5">Enum Variable</label></li>
					<li><input id="q4c6" type="radio" name="q4"><label for="q4c6">Macro Variable</label></li>
				</ul>
			</div>
		</div>

		<div class="message">
			<h1 class="message-header">Question 5</h1>
			<p class="message-body question">
				In the following piece of code, what type of variable is being initialized?<br>
				<small><i>Note</i>: The variable type you have to guess is marked by '???'.</small>
			</p>
			<pre class="line-numbers"><code class="language-clike">??? Fruits {
	Apple,
	Banana,
	Grapes,
	Orange,
	WaterMelon
}

var breakfast = Fruits.Orange;</code></pre>
			<span class="code-description">Can you guess the type of the variable being initialized?</span>
			<div class="message-body">
				<ul class="indexList choices">
					<li><input id="q5c1" type="radio" name="q5"><label for="q5c1">Instance Variable</label></li>
					<li><input id="q5c2" type="radio" name="q5"><label for="q5c2">Local Variable</label></li>
					<li><input id="q5c3" type="radio" name="q5"><label for="q5c3">Global Variable ( via object )</label></li>
					<li><input id="q5c4" type="radio" name="q5"><label for="q5c4">Global Variable ( via definition )</label></li>
					<li><input id="q5c5" type="radio" name="q5"><label for="q5c5">Enum Variable</label></li>
					<li><input id="q5c6" type="radio" name="q5"><label for="q5c6">Macro Variable</label></li>
				</ul>
			</div>
		</div>

		<div class="message">
			<h1 class="message-header">Question 6</h1>
			<p class="message-body question">
				Is the following piece of code valid?
			</p>
			<pre class="line-numbers"><code class="language-clike">var index;
index = 0;

if( true ) {
	var b;
	b = 8;
}

b = index;</code></pre>
			<span class="code-description">Is this code valid?</span>
			<div class="message-body">
				<ul class="indexList choices">
					<li><input id="q6c1" type="radio" name="q6"><label for="q6c1">Yes</label></li>
					<li><input id="q6c2" type="radio" name="q6"><label for="q6c2">No</label></li>
				</ul>
			</div>
		</div>

		<div class="message">
			<h1 class="message-header">Question 7</h1>
			<p class="message-body question">
				In the following piece of code, what is the '<i>Highscore</i>' variable type?
			</p>
			<pre class="line-numbers"><code class="language-clike">globalvar Highscore;</code></pre>
			<span class="code-description">Can you guess <i>Highscore</i>'s type?</span>
			<div class="message-body">
				<ul class="indexList choices">
					<li><input id="q7c1" type="radio" name="q7"><label for="q7c1">Instance Variable</label></li>
					<li><input id="q7c2" type="radio" name="q7"><label for="q7c2">Local Variable</label></li>
					<li><input id="q7c3" type="radio" name="q7"><label for="q7c3">Global Variable ( via object )</label></li>
					<li><input id="q7c4" type="radio" name="q7"><label for="q7c4">Global Variable ( via definition )</label></li>
					<li><input id="q7c5" type="radio" name="q7"><label for="q7c5">Enum Variable</label></li>
					<li><input id="q7c6" type="radio" name="q7"><label for="q7c6">Macro Variable</label></li>
				</ul>
			</div>
		</div>

		<div class="message">
			<h1 class="message-header">Question 8</h1>
			<p class="message-body question">
				Which variable type can be accessed from other objects by using the '.' (dot) operator?
			</p>
			<pre class="line-numbers"><code class="language-clike">obj_player.name</code></pre>
			<span class="code-description">Can you guess the variable type of '<i>name</i>'?</span>
			<div class="message-body">
				<ul class="indexList choices">
					<li><input id="q8c1" type="radio" name="q8"><label for="q8c1">Instance Variable</label></li>
					<li><input id="q8c2" type="radio" name="q8"><label for="q8c2">Local Variable</label></li>
					<li><input id="q8c3" type="radio" name="q8"><label for="q8c3">Global Variable ( via object )</label></li>
					<li><input id="q8c4" type="radio" name="q8"><label for="q8c4">Global Variable ( via definition )</label></li>
					<li><input id="q8c5" type="radio" name="q8"><label for="q8c5">Enum Variable</label></li>
					<li><input id="q8c6" type="radio" name="q8"><label for="q8c6">Macro Variable</label></li>
				</ul>
			</div>
		</div>

		<div class="message">
			<h1 class="message-header">End of Exercice 1</h1>
			<p id="correctmeMessage" class="message-body">When you are done, press the button below.</p>
			<div class="message-body" style="text-align: center">
				<input id="correctmeButton" type="button" class="button primary" value="Correct Me!" style>
			</div>
		</div>

	</div>

	<div id="mm" class="modal message">
		<h1 id="mmTitle" class="message-header">Modal Title</h1>
		<p id="mmText" class="message-body">Some modal content...</p>
		<div class="message-body" style="text-align: center;">
			<input type="button" id="mmButton" class="button modal-button" value="Close">
		</div>
	</div>
	<div id="mmOverlay" class="modal-overlay"></div>

	<script>
		var exercice_completed = false;

		$("#member-page-container code").each( function( i,e ) {
			Prism.highlightElement( e );
		});

		$("#correctmeButton").on("click", ()=>{
			if( exercice_completed ) {
				$("#mmTitle").html("Calm down!");
				$("#mmText").html("You've already completed this exercice!");
				$("#mm").addClass("show");
				return;
			}

			if(
				$("#q1c2").is(":checked") &&
				$("#q2c6").is(":checked") &&
				$("#q3c2").is(":checked") &&
				$("#q4c3").is(":checked") &&
				$("#q5c5").is(":checked") &&
				$("#q6c2").is(":checked") &&
				$("#q7c4").is(":checked") &&
				$("#q8c1").is(":checked")
			){
			<?php if( $can_unlock ) { ?>
				$("#mmTitle").html("Success!");
				$("#mmText").html("");
				$("<p></p>").html("Congratulation!").appendTo("#mmText");
				$("<p></p>").html("You've completed the exercice!").appendTo("#mmText");
				$("<span></span>").css("color","yellow").html(" + 5 XP").appendTo("#mmText");
				$("#mm").addClass("show");
				$.ajax({
					method: "POST",
					url: "../../php/complete_exercice.php",
					data: {
						uid:"<?php echo $_SESSION["userid"]; ?>",
						eid:"<?php echo $_exercice_tracking; ?>",
						xp: 5
					}
				});
				exercice_completed = true;
			<?php } else { ?>
				$("#mmTitle").html("Success!");
				$("#mmText").html("");
				$("<p></p>").html("Congratulation!").appendTo("#mmText");
				$("<p></p>").html("You've completed the exercice!").appendTo("#mmText");
				$("<span></span>").html("No xp earned because you already completed this exercice.").appendTo("#mmText");
				$("#mm").addClass("show");
			<?php } ?>
			}
			else {
				$("#mmTitle").html("Oups...");
				$("#mmText").html("The exercice still contains some errors...");
				$("#mm").addClass("show");
			}
		});

		$("#mmButton").on("click",()=>{ $("#mm").removeClass("show"); });
	</script>

</div>

<?php } ?>
