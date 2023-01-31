<?php h("Arlith Wiki - Presentation Framework");?>
<h1>Presentation Framework</h1>
<p>
	The Presentation Framework is a framework for making user interfaces
	that's designed to maximize the ability to <i>skin</i> (or theme or
	style) user interfaces, with little redundancy in user interface (UI)
	logic. The framework is chiefly used by frontends that use the <a
		href="/frontend-api">Frontend API</a>. The framework considers a user
	interface as two two conceptual parts:
</p>
<ul>
	<li><em>Logic</em>, which dictates the behavior of the user interface
		when it is invoked by the user (e.g. user presses a button), or when
		it needs to generate, query, or otherwise garner information to
		display, and</li>
	<li><em>Presentation</em>, which determines how garnered information is
		displayed to the user and how modals for the user to communicate
		information or commands to the Logic are to be shown to the user.</li>
</ul>
<p>
	Typically, a user interface will have one Logic implementation and
	multiple Presentation implementations for a user interface will be
	provided by <em>Themes</em> that choose to support the user interface.
	When a Frontend determines that a user interface needs to be shown, an
	instance of its Logic is instantiated and a Theme is queried to provide
	a corresponding presentation implementation. Once a presentation
	implementation is obtained, it is linked with the logic implementation
	(if necessary), and then shown to the user. The Client Frontend keeps
	an ordered list of Themes, sorted by priority, for generating
	presentations for interfaces. When an interface needs to be shown, it
	queries each Theme, in order of priority, until it finds a Theme that
	can successfully generate a Presentation instance for the interface.
</p>
<h2>User Interface Structure</h2>
<p>
	Each user interface should have a corresponding Logic <code>interface</code>
	and Presentation <code>interface</code>. Conventionally, these
	interfaces are named based on the name of the user interface, for
	example, for the Home scene in Arlith (that shows immediately after
	logging in), the interfaces are <code>HomeLogic</code> and <code>HomePresentation</code>.
	These interfaces extend <code>Logic&lt;HomePresentation&gt;</code> and
	<code>Presentation&lt;HomeLogic&gt;</code>, respectively. Typically,
	the two interfaces are designed so that the Presentation has methods
	that allow the Logic to push information to the UI (to show to the
	user; commonly called <i>show</i> methods), and query information from
	the UI (to accept user input for, e.g., processing; commonly called <i>get</i>
	methods), and so that the Logic has methods that allow the Presentation
	to <i>trigger</i> certain actions in the Logic, (these reflect a user
	invoking some action in the logic, e.g. when the user pushes a button
	to submit some data).
</p>
<h3>Creating a UI</h3>
<p>Broadly, these are the steps to creating a UI under the framework:</p>
<ol>
	<li>Create interface subtypes <code>NameLogic extends
			Logic&lt;NamePresentation&gt;</code> and <code>NamePresentation
			extends &lt;NameLogic&gt;</code>, where <code>Name</code> is the name
		of the UI.
		<ul>
			<li>Populate the logic with any <b>trigger</b> methods needed to let
				the user invoke actions through the UI.
			</li>
			<li>Populate the presentation with any <b>get</b> methods and <b>show</b>
				methods needed to allow the UI to grab and show any information it
				needs.
			</li>
		</ul>
	</li>
	<li>Create an implementation class of <code>NameLogic</code>, typically
		<code>NameLogicImpl implements NameLogic</code>.<sup info=1></sup><span
		info=1>When this UI needs to be shown, say, by a previous UI, an
			instance of the logic implementation is provided to a Theme to select
			an appropriate presentation.</info>
	</span>
	</li>
	<li>Implement <code>NamePresentation</code> under a theme, typically as
		<code>NamePresentationImpl implements NamePresentation</code>.
		<ul>
			<li>The <code>NamePresentationImpl</code> class should implement the
				<code>getScene()</code> method, (declared by <code>Presentation</code>),
				which generates the JavaFX <code>Scene</code> to be shown to the
				user.<sup info=2></sup><span info=2>The Frontend uses this method to
					grab the scene and display it in the currently active window so
					that the presentation is shown to the user.</span></li>
		</ul>
	</li>
	<li>Finally, attach the/each presentation to its Theme by editing the
		corresponding <code>Theme</code> subclass so that its <code>supply(Logic)</code>
		method returns an instance of <code>NamePresentationImpl</code>
		whenever any subtype of <code>NameLogic</code> is provided.<sup info=3></sup><span
		info=3>This most often looks similar to:<pre style="font-size: 1.1em;"><code>@SuppressWarnings("unchecked")
@Override
public &lt;P extends Presentation&lt;L&gt;, L extends Logic&lt;P&gt;&gt; P <span
					style="color: gold;">supply(L userInterface)</span> {
	if (userInterface instanceof <span style="color: green;">NameLogic</span>)
		return (P) new <span style="color: hotpink;">NamePresentationImpl</span>((<span style="color: green;">NameLogic</span>) userInterface);
	return null;
}</code></pre></span>
	</li>
</ol>
<h2>Implementation Notes</h2>
<p>
	The Presentation Framework is <i>currently contained within the Client
		Frontend</i>. It should, at some point, be moved to a more generic, <code>libraries</code>
	sub-package.
</p>