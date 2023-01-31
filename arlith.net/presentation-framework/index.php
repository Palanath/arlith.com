<?php h("Arlith Wiki - Presentation Framework");?>
<h1>Presentation Framework</h1>
<p>
	The Presentation Framework is a framework for making user interfaces
	that's designed to maximize the ability to <i>skin</i> (or theme or
	style) user interfaces, with little redundancy in user interface logic.
	The framework is chiefly used by frontends that use the <a
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
<h2>Creating User Interfaces</h2>
<p>
	Each user interface should have a corresponding Logic <code>interface</code>
	and Presentation <code>interface</code>.
</p>

<h2>Implementation Notes</h2>
<p>
	The Presentation Framework is <i>currently contained within the Client
		Frontend</i>. It should, at some point, be moved to a more generic, <code>libraries</code>
	sub-package.
</p>