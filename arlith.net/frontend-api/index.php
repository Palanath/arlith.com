<?php h("Frontend API - Arlith Wiki");?>
<h1>Frontend API</h1>
<p>
	The <i>Frontend API</i> is a set of classes that comprise a framework
	upon which each of Arlith's <i>frontends</i> is built. A frontend is
	the set of classes representing the user interface for one of the
	runtime modes of Arlith.
</p>
<p>The bulk of Arlith's code is organized into:</p>
<ul>
	<li><i>the frontend</i>, consisting of code defining user interfaces,</li>
	<li><i>the backend</i>, consisting of the Arlith client and server
		software components, and the APIs shared between them,</li>
	<li><i>libraries</i>, which encompasses general code utilities
		(designed to make Arlith work, but general enough to be used for other
		applications), and</li>
	<li><i>launchers</i> which are a few classes dedicated to launching
		different frontends of the application in different environments.</li>
</ul>
<?php t();