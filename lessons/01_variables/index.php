<div id="member-page-container">
	<div id="member-page" class="nextShortTransition animFadeInLeftAlt transition-exclude">

		<div class="message">
			<h1 class="message-header">Lesson 01 - Variables</h1>
			<p class="message-body">
				In this lesson, we will take a look at the available variables in <i>Game Maker</i> and define them,
				understand them and view examples.<br><br>
				To complete this lesson, you will have to clear the exercise which follows.
			</p>
		</div>

		<div class="message">
			<h1 class="message-header">What will we cover...</h1>
			<div class="message-body">
				<ol class="indexList">
					<li><a href="#whatisvar">What is a variable</a></li>
					<li><a href="#howtouse">How to use a variable</a></li>
					<li><a href="#available">What are the available variables</a></li>
					<li><a href="#conclusion">Conclusion</a></li>
				</ol>
			</div>
		</div>

		<div id="whatisvar" class="message">
			<h1 class="message-header">What is a variable?</h1>
			<p class="message-body">
				In every day's life, you constantly need to be able to remember. Might it be to remember your name,
				remember what you were about to do or even remember what you have to do at 14:30. In short, you have to
				remember a bunch of things.
				<br><br>
				The most efficient way to code is to copy what we do in reality. As such, we need a way to
				<i>remember</i> some information in our code. This is what a variable is for.
				<br><br>
				Wikipedia's definition of a variable:
				<span class="quote">
					In computer programming, a <i>variable</i> is a <i>storage location</i> paired with an associated
					<i>symbolic name (an identifier)</i>, which contains some known or unknown quantity of information
					referred to as a <i>value</i>. <i>The variable name is the usual way to reference the stored
					value</i>; this separation of name and content allows the name to be used independently of the
					exact information it represents. The <i>identifier</i> in computer source code can be bound to a
					<i>value </i> during run time, and the <i>value</i> of the <i>variable</i> may thus <i>change</i>
					during the course of program execution.
				</span>
				To put it in simple words, a <i>variable</i> is a combination of an <i>identifier</i> and a
				<i>value</i>. This value <i>can change</i> which means a <i>variable</i> can forget a value to remember
				a new one.
			</p>
		</div>

		<div id="howtouse" class="message">
			<h1 class="message-header">How to use a variable</h1>
			<p class="message-body">
				You can set a variable's value by <i>assigning</i> it, which is done using the <i>equal '='</i>
				operator. You can set the number <i>5</i> to the variable <i>score</i> with the following piece of code:
			</p>
			<pre class="line-numbers"><code class="language-clike">score = 5;</code></pre>
			<span class="code-description">Storing the value <i>5</i> in the variable <i>score</i></span>
			<p class="message-body">
				We can then <i>retrieve</i> the value <i>stored</i> inside the variable by placing the variable on the
				other side of the <i>assignment </i> operator:
			</p>
			<pre class="line-numbers"><code class="language-clike">value = score;</code></pre>
			<span class="code-description">Assigning the value of <i>score</i> to <i>value</i></span>
			<p class="message-body">
				The above piece of code does two things, first it gets the variable stored inside <i>score</i>, then it
				stores it inside the variable <i>value</i>.
			</p>
			<p class="message-body">
				In the end, using a <i>variable</i> is simple. You store a <i>value</i> inside it, which you can then
				later <i>retrieve</i> by using the <i>variable</i> like if it was your common <i>number</i> or
				<i>string</i>.
			</p>
		</div>

		<div id="available" class="message">
			<h1 class="message-header">Lesson 01 - Variables</h1>
			<p class="message-body">
				In this lesson, we will take a look at the available variables in <i>Game Maker</i> and define them,
				understand them and view examples.<br><br>
				To complete this lesson, you will have to clear the exercise which follows.
			</p>
		</div>

		<div id="conclusion" class="message">
			<h1 class="message-header">Lesson 01 - Variables</h1>
			<p class="message-body">
				In this lesson, we will take a look at the available variables in <i>Game Maker</i> and define them,
				understand them and view examples.<br><br>
				To complete this lesson, you will have to clear the exercise which follows.
			</p>
		</div>

		<script>
			$("#member-page-container code").each( function( i,e ) {
				Prism.highlightElement( e );
			});
		</script>

	</div>
</div>
