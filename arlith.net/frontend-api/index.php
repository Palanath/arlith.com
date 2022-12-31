<?php h("Frontend API - Arlith Wiki");?>
<h1>Frontend API</h1>
<p>
	The <i>Frontend API</i> is a set of classes that comprise a framework
	upon which each of Arlith's <i>frontends</i> is built. A frontend is a
	set of classes and resources, that comprise the user interfaces for one
	functional component of Arlith. Typically a frontend is designed on top
	of a backend.
</p>
<p>The bulk of Arlith's code is organized into:</p>
<ul>
	<li>the <em>Frontend</em>, consisting of code defining user interfaces,
	</li>
	<li>the <em>Backend</em>, consisting of the Arlith client and server
		software components, and the APIs shared between them,
	</li>
	<li><em>Libraries</em>, which encompasses general code utilities
		(designed to make Arlith work, but general enough to be used for other
		applications), and</li>
	<li><em>Launchers</em> which are a few classes dedicated to launching
		different frontends of the application in different environments.</li>
</ul>
<p>
	An example of one of Arlith's frontends is the Client Frontend. The
	Client API is a component of Arlith's backend that can operate as a
	fully functional client (i.e. connect to a server, log in, invoke
	requests, etc.), however most of Arlith's users interface with this API
	through GUIs (such as the log in GUI that shows when the app is
	launched by default). These GUIs, their code, and their resources are
	all a part of the <em>Client Frontend</em>. Other frontends can be
	created which allow an end user to interface with a different backend
	component (or different components), or to allow the user to interface
	with the same component in a different way (for example, a
	terminal/command-line&ndash;based user interface for the client would
	constitute another frontend).
</p>
<p>
	Arlith's API organizes <em>Frontends</em> into programmatically and
	conceptually separate components for the following reasons:
</p>
<ul>
	<li>organization and</li>
	<li>independence in operation and class loading between frontends.</li>
</ul>
<div class="blurb info">Because of library dependence (e.g. dependence
	on JavaFX for the Client Frontend), it's useful to have different
	Frontends be entirely separated from each other programmatically. To
	illustrate this, consider the following example. The Client Frontend
	and Server Frontend (currently a CLI, feedback interface) are both
	compiled into the same Arlith JAR application, but the Client Frontend
	depends on JavaFX whereas the server does not. When running the JAR
	application on a physical server computer (e.g. a VPS), JavaFX is often
	not present. (Sometimes the operating system does not even have a
	desktop or GUI environment set up.) When launching the application in
	server mode, references to the client's code would potentially cause
	Java to attempt to load JavaFX classes (resulting in a runtime error,
	since they are not present), but because the client and server
	frontends are programmatically distinct, it's easy for the server
	frontend to be loaded completely disjointly from the client frontend.</div>
<h2>Frontend Structure</h2>
<figure class="float-left" style="--default-size: 400px; --expanded-size: 800px;">
	<h3>Frontend Invocation Structure</h3>
	<img src="frontend-invocation-structure.svg"
		alt="Depicts four classes, each shown as a rectangular box with a name inside, in a pyramid shape, with one box at top-middle and the other three laid out horizontally underneath the top box. The top box is named &quot;Main Class&quot;. The bottom-left box is named &quot;Initial Scene&quot;, with an italicized name. The bottom-middle box is named &quot;Second Scene&quot; and the bottom-right box is named &quot;Third Scene&quot;. There is an arrow from the Main Class box pointing to the Initial Scene box, an arrow from the Initial Scene box pointing to the Second Scene box, and an arrow from Second Scene pointing to Third Scene. There are also arrows &quot;looping back&quot; from Second Scene to Initial Scene, Third Scene to Second Scene, and Third Scene to Initial Scene.">
	<figcaption>
		A diagram depicting the invocation capability of a typical,
		three-scene Frontend. The Main Class first invokes the <i>Initial
			Scene</i>, causing it to be shown to the user. The <i>Initial Scene</i>
		may then show the Second Scene to the user, which may then show the
		Third Scene. The Second and Third Scenes may allow the user to "go
		back" to the previous scene, or all the way to the beginning (the <i>Initial
			Scene</i>), so the arrows underneath all of the four boxes depict
		invocation in the opposite direction.
	</figcaption>
</figure>
<p>Conceptually, a frontend is best described as a mode of operation of
	Arlith. The Java JAR application that users download by default shows
	the Client Frontend when launched without any options, but can be
	configured to, e.g., launch a server instead. The application can have
	multiple frontends which are designed for different purposes, and
	different frontends can be selected during launch time.</p>
<p>
	The Frontend API considers a frontend to be composed of a main class,
	that extends the <code>Frontend</code> type. This main class is where
	the state, including instances of backend API objects, is stored and
	shared between other components of the Frontend.<sup info=1></sup> <span
		info=1>The main Frontend class is structured like this because
		Frontends usually each act as a user interface for <i>some
			component(s)</i> in the backend code of Arlith, so a Frontend often
		has to share state and instances of backend API code between different
		GUIs or Scenes.
	</span> Most (GUI-based) Frontends have multiple GUI classes, each
	representing one specific part (AKA page or window) of the GUI. JavaFX
	denotes these parts <em>scenes</em>. A Frontend's main class gets
	instantiated, configured, and then launched by a launcher in the <code>launchers</code>
	package of Arlith's codebase, which causes it to show the initial scene
	of its user interface to the user. If the Frontend has more than one
	scene then the initial scene may instantiate and show other scenes, and
	each of those may do the same.
</p>
<p>The Frontend API does not specify what exactly constitutes a scene; a
	large Frontend may choose to consider of all its GUI code to comprise
	one scene, whereas a small Frontend may yet be split into many, many
	scenes. Nevertheless, code comprising scenes can access state and
	configuration information in its respective Frontend's main class and
	can cause other scenes to be shown.</p>
<?php

t();