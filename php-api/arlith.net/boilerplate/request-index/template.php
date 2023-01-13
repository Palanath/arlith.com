<?php include("arlith.net/boilerplate/wiki_template.php");
function addGenericRequestErrors() {?>
	<tr class="generic-error" title="Syntax Errors are generic; all requests can result in a SyntaxError.">
		<td>Syntax</td>
		<td>SyntaxError</td>
		<td>If the request is syntactically invalid.</td>
	</tr>
	<tr class="generic-error" title="Rate Limit Errors are generic; all requests can result in a RateLimitError.">
		<td>Rate Limit</td>
		<td>RateLimitError</td>
		<td>If the server attempts to rate limit the connection.</td>
	</tr>
	<tr class="generic-error" title="Server Errors are generic; all requests can result in a ServerError.">
		<td>Server</td>
		<td>ServerError</td>
		<td>If the server encounters an unknown, unexpected error.</td>
	</tr>
	<tr class="generic-error" title="Restricted Errors are generic in that all, if not most, requests can result in a RestrictedError.">
		<td>Restricted</td>
		<td>RestrictedError</td>
		<td>If the current connection does not have permission to invoke this request.</td>
	</tr>
	<tr class="generic-error" title="Illegal Protocol Errors are generic; all requests can result in an IllegalCommunicationProtocolException.">
		<td>Illegal Protocol Error</td>
		<td>IllegalCommunicationProtocolException</td>
		<td>Denotes that the server responded with an error that should not have been sent. This is usually indicative of the client and server running different versions (and that the specification for this request was updated between those two versions, causing the client and server to be incompatible). If this is thrown, it will wrap the unexpected CommunicationProtocolError that was thrown.</td>
	</tr>
<?php }