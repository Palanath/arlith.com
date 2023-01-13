<?php h("Arlith Wiki - Change email request documentation");?>
<h1>Change Email Request</h1>
<p>This request allows users to change the email address associated with
	their account. After successfully invoking the request, the email
	address associated with the invoker's account will be the address
	specified in the request.</p>
<div class="blurb info">
	This request requires the connection to be <a
		href="/authorized-connection">authorized</a>.
</div>
<h2>Structure</h2>
<p>This request has the following parameters:</p>
<table class="request-parameters">
	<tr>
		<th>Parameter Name</th>
		<th>Type</th>
		<th>Description</th>
		<th>Optional?</th>
	</tr>
	<tr>
		<td>Email</td>
		<td>TextValue</td>
		<td>The new email to associate with this account.</td>
		<td data-optional=no></td>
	</tr>
</table>