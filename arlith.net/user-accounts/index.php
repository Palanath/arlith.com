<?php h("User Accounts - Arlith Wiki");?>
<h1>User Accounts</h1>
<p>
	This page documents <em>user accounts</em> and the data associated with
	each (i.e. username, email, etc).
</p>
<p>
	User accounts each possesses a <em>tag</em> and <em>email</em>. A tag
	is comprised of a <em>username</em>, which is a user-chosen name that
	colloquially identifies a user, and a <em>discriminator</em>, which is
	a small, server generated text suffix. Usernames are not uniquely
	allocated to accounts, but tags are unique; each tag can only be
	assigned to one account at any given time. The structure of each user
	account datum is specified below.
</p>
<h2>Usernames</h2>
<p>Usernames are the user-chosen, colloquial identifier for an account.
	Alone, they do not uniquely identify an account and cannot be used to
	log in. Usernames are subject to the following syntactic restrictions;
	each username:</p>
<ul>
	<li>Must be at least 3 characters long,</li>
	<li>Must be at most 20 characters long,</li>
	<li>Must not contain a <code>#</code>, <code>@</code>, <code>&lt;</code>,
		<code>&gt;</code>, nor a <code>'</code> character.
	</li>
</ul>
<h2>Emails</h2>
<p>Emails are a required datum for each user account. Emails are
	currently not used by the application in any way apart from
	authorization, but will, in the future, be used to verify users.</p>
<p>Each provided email must be a valid email address and should not be
	used by more than one account at any time. They can be used to log in.</p>
<h2>Phone Number</h2>
<p>
	Phone numbers are optional, but, if provided, must be unique and can
	also be used to log in. Each phone number should be a valid, canonical
	phone number. For distinguishment purposes, a non-canonical number
	should be treated as equivalent to a canonical number.<sup
		info=non-canonical-phones></sup><span info=non-canonical-phones>Multiple,
		valid phone numbers can point to the same endpoint (sometimes while
		enabling "features," such as <code>*67</code>. For example, phone
		numbers excluding the country-code prefix <code>+1</code> in the US
		can reach the same endpoint as phone numbers that include it. It is
		not specified here, right now, what form of a phone number is
		considered canonical and is the number stored by the server when a
		phone number is assigned to a user account, but a non-canonical phone
		number should be treated as equivalent to non-canonical phone numbers,
		both for purposes of users logging in and for purposes of determining
		whether a phone number is already registered with an account.
	</span>
</p>
<h2>Discriminator</h2>
<p>A discriminator is a suffix, appended to an account's username to
	form their tag, which allows a user to be uniquely identified. For
	normal user accounts, a discriminator is a sequence of at least 4
	decimal digits.</p>
<h3>Generation</h3>
<p>The implementation of the server is free to determine how to generate
	a discriminator for a user, subject to the following rules: Only once
	all length-four discriminators, for a particular username, are
	allocated to user accounts will discriminators of length
	greater-than-four start being allocated for that username. The server
	need not, but is encouraged to, allocate all discriminators of length 5
	before moving on to granting discriminators of length 6.</p>
<h4>Default Implementation</h4>
<p>The default implementation of the discriminator generator for the
	server uses the following algorithm:</p>
<ul>
	<li>If all length-four discriminators are already allocated for the
		username in question,
		<ol>
			<li>Start with potential discriminator <code>10000</code>.
			</li>
			<li>Check if the potential discriminator is taken for the username in
				question. If it is, increment the potential discriminator by <code>1</code>
				and repeat this step, otherwise, return the potential discriminator.
			</li>
		</ol>
	</li>
	<li>Otherwise,
		<ol>
			<li>Pick a random number from <code>0</code> to <code>9999</code>.
			</li>
			<li>Pad the string representation of the number with <code>0</code>s
				on the left to get the potential discriminator.
			</li>
			<li>Check if the potential discriminator is taken; if it is,
				increment the random number and repeat from the previous step.
				Otherwise, return the potential discriminator.</li>
		</ol>
	</li>
</ul>
<p class="note">
	Note: that this implementation does not allocate discriminators of
	length greater than four with <code>0</code>s in any position but the
	rightmost 4.
</p>
<p class="note">
	Note: There are plans to include special discriminators, (such as those
	formed from hexadecimal digits, or those of fewer length than 4), for
	special types of accounts or special meanings. Because of this, the
	server should <i>allocate/grant</i> discriminators in accordance with
	the above specifications but should <em>support</em> accounts with
	arbitrary discriminators subject to the constraint that a user's tag is
	globally unique.
</p>
<h2>Tags</h2>
<p>
	A tag is a combination of a username, a <code>#</code> character, and a
	discriminator, which uniquely identifies a user. Tags have no syntactic
	restrictions besides those imposed by its constituent components. Each
	account possesses a tag that cannot be directly changed by the user,
	but can be retrieved. The tag is always composed of the account's
	current username and discriminator.
</p>
<h3>Examples</h3>
<ol>
	<li><code>user#1234</code></li>
	<li><code>Martin#9985</code></li>
	<li><code>HamsterGuy#10049</code></li>
</ol>
<?php
t();