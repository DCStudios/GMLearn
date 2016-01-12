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
			<h1 class="message-header">What are the available variables?</h1>
			<p class="message-body">
				There are 6 types of variables in GameMaker:Studio.
			</p>
			<div class="message-body">
				<ul class="indexList" style="list-style-type: circle">
					<li>Instance Variable</li>
					<li>Local Variable</li>
					<li>Global Variable ( via object )</li>
					<li>Global Variable ( via definition )</li>
					<li>Macro Variable ( also known as Constant )</li>
					<li>Enum Variable</li>
				</ul>
			</div>
		</div>

		<div id="instance-var" class="message">
			<h1 class="message-header">Instance Variables</h1>
			<p class="message-body">
				The first type is the one you probably will use the most, <i>instance variables</i>.
				Those are variables like the <i>x</i> position, the <i>image_index</i>,
				the <i>sprite_index</i>, the <i>speed</i>, etc.
				They are variables that are available <i>anywhere</i> in the <i>instance itself</i> ( any events ).
				You can also access those variables via the '<i>.</i>' ( dot ) operator.<br>
				for example:
			</p>
			<pre class="line-numbers"><code class="language-clike">player.x</code></pre>
			<span class="code-description">Accessing the <i>instance</i> variable <i>x</i> from the object player.</span>
			<p class="message-body">
				The code above will <i>access</i> the 'x' <i>instance variable</i> from the <i>object player</i>.
				You can create your own <i>instance variable</i> by simply using the <i>assignation operator</i> ('=').
			</p>
			<pre class="line-numbers"><code class="language-clike">test = 5;</code></pre>
			<span class="code-description">Assigning the <i>instance</i> variable <i>test</i> the <i>value</i> 5.</span>
			<p class="message-body">
				This creates the <i>instance variable</i> "test", and <i>stores</i> the value 5 in it.
				You can use <i>any variable name you want</i>, as long as they aren't an
				<i>already existing variable</i>'s name.
				You can't create a new 'x' variable, because that variable <i>already exists</i>.
				On the other side, you can create a variable with <i>the same name</i> as one that is found
				in <i>another object</i>. For example, in an object named player, you could create a variable called 'name',
				and in an object named enemy, you could <i>also</i> create a variable called 'name'.
				GameMaker will understand they are <i>two different variables</i>.
			</p>
		</div>
		<div id="local-var" class="message">
			<h1 class="message-header">Local Variables</h1>
			<p class="message-body">
				The second type of variable is called a <i>local variables</i>.
				A <i>local variable</i> can only be used in the <i>scope</i> where it is created.
				A <i>scope</i> can be seen as a "section" of the code.<br>
				For example, the <i>if condition</i> expects a block of code. Such block of code have their own <i>scope</i>:
			</p>
			<pre class="line-numbers"><code class="language-clike">if( a == 5 ) {
    // this here is a block of code
    // it's also a scope!
}</code></pre>
			<span class="code-description">The <i>scope</i> of an <i>if condition</i>.</span>
			<p class="message-body">
				If you create a <i>local variable</i> INSIDE a <i>scope</i>, that variable is <i>not accessible</i>
				OUTSIDE the scope. Here is an example:
			</p>
			<pre class="line-numbers"><code class="language-clike">// You create local variable by
// adding 'var' in front of them
var a;
a = 5;
if( a == 5 ) {
    // We define another var,
    // this time INSIDE the scope
    var b;

    // I can use a, because the scope
    // of 'b' is inside the scope of 'a'
    b = a;
}
// This is an error, b doesn't exists anymore,
// because we aren't inside it's scope!
a = b;</code></pre>
			<span class="code-description">Valid and invalid <i>access</i> to <i>local variables</i> in <i>scopes</i>.</span>
			<p class="message-body">
				Also, a <i>local variable</i> is <i>not accessible</i> in <i>other events</i>!
				If you create a <i>local variable</i> in the <i>create event</i>, you <i>cannot</i> access it in the <i>draw event</i>,
				because the <i>create event</i> is a <i>scope</i> and the <i>draw event</i> is another <i>different scope</i>.
			</p>
		</div>
		<div id="global-obj-var" class="message">
			<h1 class="message-header">Global Variables ( via object )</h1>
			<p class="message-body">
				The 3rd type of variable in GameMaker is called a <i>global variable</i>.
				Actually, GameMaker supports 2 types of <i>global variable</i>, so let's cover
				the first one: The <i>global object</i>.<br>
				You can create a <i>global variable</i> by accessing the <i>global</i> object.
			</p>
			<pre class="line-numbers"><code class="language-clike">global.myGlobalVariable = 5;</code></pre>
			<span class="code-description">Creating a <i>global variable</i> via the <i>global object</i>.</span>
			<p class="message-body">
				A <i>global variable</i> is accessible by <i>any objects</i>, from <i>any events</i> and from <i>any rooms</i>.
				That's why it is called '<i>global</i>'.
			</p>
		</div>
		<div id="global-var" class="message">
			<h1 class="message-header">Global Variables ( via definition )</h1>
			<p class="message-body">
				The 4rth variable type is a different way to create <i>global variables</i>.
				Since it is "weird" to write <i>global.variableName</i> all the time, you can <i>define</i> a variable
				to <i>be global</i> instead. Like with the <i>local variable</i>, you can add a <i>definition keyword</i>
				in front of it, named <i>globalvar</i>:
			</p>
			<pre class="line-numbers"><code class="language-clike">globalvar MyGlobalVariable;
MyGlobalVariable = 5;

if( MyGlobalVariable == 5 ) game_end();</code></pre>
			<span class="code-description"><i>Defining</i> a <i>global variable</i> and using it.</span>
			<p class="message-body">
				This way you don't need to add 'global.' in front of the variable name all the time.
			</p>
		</div>
		<div id="macro-var" class="message">
			<h1 class="message-header">Macro Variables ( Constants )</h1>
			<p class="message-body">
				The 5th variable type is called a <i>macro</i>, or if you prefer a <i>constant</i>.
				This type of variable is used only to make the code <i>easier to READ</i>.
				This variable's value <i>does not change</i>. You <i>can't define one in code</i>.
				You have to define all macros in the 'macros' section in the <i>resource tree</i> on the left in the gamemaker ide.
				At some points, you'll be using numbers to <i>represent things</i> in your game,
				or you will be using <i>arrays</i> or <i>grids</i> to <i>store information</i>.
				When you work with <i>indexes</i>, sometimes using a number like '3' doesn't help you remember <i>what is stored</i>
				at that position. So you would create a <i>macro</i> to make it easier.
			</p>
			<pre class="line-numbers"><code class="language-clike">var selected_item = 5;
var selected_item_name;

// Without a macro
selected_item_name = items[ selected_item, 3 ];

// With a macro
selected_item_name = items[ selected_item, ITEM_NAME ];</code></pre>
			<span class="code-description">Instead of using number 3, a macro is used. Easier to read.</span>
			<p class="message-body">
				With <i>macros</i>, you can now remember that the position 'ITEM_NAME' has the name of the item,
				you don't need to worry about it being number 3!
			</p>
		</div>
		<div id="enum-var" class="message">
			<h1 class="message-header">Enum Variables</h1>
			<p class="message-body">
				The last variable type in GameMaker is called an <i>enum</i>.
				Since constants <i>cannot be created in code</i>, GameMaker supports something similar,
				that <i>can be created in code</i>. Those are the <i>enum</i>.<br>
				To define an <i>enum</i>, you would do it like this:
			</p>
<pre class="line-numbers"><code class="language-clike">enum States {
    Idle,
    Walking,
    Running,
    Jumping,
    Attacking,
    Defending,
    Dead
}

var state = State.Running;</code></pre>
			<span class="code-description">Creating an <i>enum</i> representing <i>states</i>.</span>
			<p class="message-body">
				As you can see, you create a 'list of names'.
				Using the '<i>.</i>' ( dot ) operator, you can then <i>access a name</i> from that list.
				This is like <i>macros</i> in the sense you don't need to remember what the value is.<br>
				You could even <i>assign a value</i> to each name if you wanted:
			</p>
			<pre class="line-numbers"><code class="language-clike">enum States {
    Idle=1,
    Walking=2,
    Running=3,
    Jumping=4,
    Attacking=5,
    Defending=6,
    Dead=7
}</code></pre>
			<span class="code-description"><i>Defining</i> an <i>enum</i>, this time <i>assigning values</i> to each components.</span>
			<p class="message-body">
				An <i>enum</i>, like the <i>globalvar</i>, is GLOBAL to <i>every object and rooms</i>.
			</p>
		</div>

		<div id="conclusion" class="message">
			<h1 class="message-header">Conclusion</h1>
			<p class="message-body">
				GameMaker offers many variable types in order to let you be as creative as possible, while also giving
				you as many opportunities.<br><br>
				To see if you understand the different types of variables in GameMaker, here is a small quiz for you
				to complete. This is needed to unlock the next lesson!
			</p>
		</div>

		<div id="conclusion" class="message">
			<h1 class="message-header">Exercices</h1>
			<input id="e1" type="button" class="button fullWidth spacy" value="Exercice 1 - Do you know your variables? [ 5 xp ]">
		</div>

		<script>
			$("#member-page-container code").each( function( i,e ) {
				Prism.highlightElement( e );
			});

			$("#e1").on("click",()=>{
				$("#member-page-container").data("transition").Goto("lessons/01_variables/exercice_1.php");
			});
		</script>

	</div>
</div>
