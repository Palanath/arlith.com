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
<p>This request can result in the following errors:</p>
<table class="request-errors">
	<tr>
		<th>Error Name</th>
		<th>Formal Type</th>
		<th>Description</th>
	</tr>
	<tr data-error=syntax>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr data-error=rate-limit>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr data-error=server>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr data-error=restricted>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>Create Account</td>
		<td>CreateAccountError</td>
		<td>If there is a syntactic or other error with the username. See
			below<sup>[1]</sup> for details.
		</td>
	</tr>
	<tr data-error=illegal-error>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</table>