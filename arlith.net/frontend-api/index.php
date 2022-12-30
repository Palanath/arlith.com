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
	<li>the <em>Frontend</em>, consisting of code defining user interfaces,</li>
	<li>the <em>Backend</em>, consisting of the Arlith client and server
		software components, and the APIs shared between them,</li>
	<li><em>Libraries</em>, which encompasses general code utilities
		(designed to make Arlith work, but general enough to be used for other
		applications), and</li>
	<li><em>Launchers</em> which are a few classes dedicated to launching
		different frontends of the application in different environments.</li>
</ul>
<?php t();