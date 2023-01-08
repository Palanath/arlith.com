<?php h("Arlith Wiki - Client-to-Server Request Encoding");?>
<h1>Request Encoding</h1>
<p>
	The client communicates to the server using <em>requests</em>. Requests
	are synonymous to functions that are called by the client and invoked
	on the server, in that they have a set of parameters, a normal return
	value type, exceptional return value types, and a name.
</p>
<h2>Invocation</h2>
<p>
	Each class that extends <code>pala.apps.arlith.backend.common.protocol.requests.CommunicationProtocolRequest</code>
	represents a request, and instances of such classes represent
	invocations of a request that can be exported and sent to the server.
</p>
<p>
	Such request objects can have their arguments filled out, typically via
	constructor or (otherwise) via setters. Once appropriately populated,
	the request can be sent to the server via <code>CommunicationProtocolRequest#sendRequest(CommunicationConnection)</code>.
</p>
<h3>Encoding</h3>
<p>
	Arlith encodes requests via JSON. Whenever the client wants to invoke a
	request, a new JSON Object is created that stores the request's name
	and the values of any arguments. For example, a <code>ChangeEmailRequest</code>
	with the argument <code>palanath@arlith.net</code> would be 'exported'
	to the following JSON <em>package</em> object. This JSON package is the
	textual data that is sent over the network connection to the server.
	(For implementation purposes regarding the Networking API and Protocol,
	note that the package is sent as one <i>network message</i>.)
</p>
<p>
	Properties for typical requests are encoded as <code>CommunicationProtocolType</code>s,
	which can be converted to JSON format and then sent over the network.
</p>
<ul>
	<li><em>Optional</em> parameters for which arguments are not given do
		not get written to the JSON package when invoking a request.</li>
	<li>Possibly null responses (that the server sends to the client) are
		encoded as the JSON <code>NULL</code> value when sent (the server does
		this using the <code>CommunicationProtocolType#NULL</code> type).
	</li>
</ul>