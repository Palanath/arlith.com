<?php h("Arlith Wiki - Presentation Framework");?>
<h1>Presentation Framework</h1>
<p>
	The Presentation Framework is a framework for making user interfaces
	that's designed to maximize the ability to <i>skin</i> (or theme or
	style) user interfaces, with little redundancy in user interface logic.
	The framework is chiefly used by frontends using the <a
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
	Typically, a user interface will have one Logic implementation.
	Presentation implementations for a user interface are provided by <em>Themes</em>
	that choose to support the user interface; when a user interface is
	shown, an instance of its logic is instantiated and a Theme is queried
	to provide a corresponding presentation implementation. Once a
	presentation implementation is obtained, it is linked with the logic
	implementation (if necessary), and then shown to the user.
</p>
