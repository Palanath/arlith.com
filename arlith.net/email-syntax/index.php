<?php h1("Arlith Wiki - Email Syntax");?>
<style>
.production {
	color: gold;
}

.chars {
	color: #c773ff;
}

.described-production {
	color: #ff57a5;
}

.repl {
	color: #57eeff;
}

.optional:hover {
	text-decoration: line-through;
	color: #322;
	cursor: pointer;
}

.optional:hover * {
	color: #322;
}
</style>
<?php h2();?>
<h1>Email Syntax</h1>
<p>
	Arlith parses email addresses similar to their official syntax. This
	page describes how Arlith validates emails. Emails are typically
	validated by different parts of the application using the <code>pala.apps.arlith.libraries.Utilities#checkEmailValidity(String)</code>
	function. Please note that this page does not contain information about
	<em>interpretation</em> of email addresses; rather it only specifies
	syntax validation for them.
</p>
<p>Arlith's email syntax is designed to encompass nearly all
	considerably "normal" email addresses while still allowing many unusual
	formats.</p>
<h2>Specification</h2>
<p>
	Arlith considers an email to be a local part, followed by an <code>@</code>
	symbol, followed by a domain.
</p>
<pre><code><span class="production">email-address</span>   =   <span
		class="production">local-part</span> <span class="chars">'@'</span> <span
		class="production">domain</span>
<span class="production">local-part</span>      =   <span
		class="described-production">normal-local-part</span> / <span
		class="described-production">quoted-string</span>
<span class="production">domain</span>          =   <span
		class="described-production">domain-name</span> / <span class="chars">'['</span><span
		class="production">ip-addr</span><span class="chars">']'</span>
<span class="production">ip-addr</span>         =   <span
		class="described-production">ip-v4</span> / <span
		class="described-production"
		style="color: red; text-decoration: line-through;">ip-v6</span></code></pre>
<h3>Local Part</h3>
<p>
	A local part can either be <i>quoted</i> or <i>non-quoted</i>.
	Non-quoted local parts can contain any <i>local-part character</i> and
	can be split into parts, delimited by periods (<code>.</code>
	characters):
</p>
<pre><code><span class="production">local-part-char</span> =   <span
		class="chars">'a'-'z'</span> / <span class="chars">'A'-'Z'</span> / <span
		class="chars">'0'-'9'</span>
                    <span class="chars">'!'</span> / <span class="chars">'#'</span> / <span
		class="chars">'$'</span> /
                    <span class="chars">'%'</span> / <span class="chars">'&amp;'</span> / <span
		class="chars">'\''</span> /
                    <span class="chars">'*'</span> / <span class="chars">'+'</span> / <span
		class="chars">'-'</span> /
                    <span class="chars">'/'</span> / <span class="chars">'='</span> / <span
		class="chars">'?'</span> /
                    <span class="chars">'^'</span> / <span class="chars">'_'</span> / <span
		class="chars">'`'</span> /
                    <span class="chars">'{'</span> / <span class="chars">'|'</span> / <span
		class="chars">'}'</span> /
                    <span class="chars">'~'</span></code></pre>
<p>For example, the following email addresses are all valid:</p>
<ul>
	<li><code>pala@arlith.com</code> - Normal email address, simple local
		part (<code>pala</code>) followed by straightforward domain (<code>arlith.com</code>).</li>
	<li><code>pala.nath@arlith.com</code> - Normal email with period in
		local part. The period cannot be at the beginning or end of the local
		part, nor can two periods touch each other in the local part.</li>
	<li><code>"stuff in quotes"@arlith.com</code> - Email with quoted local
		part. With quotations, any character can be included in the local
		part. However, for double quotations to be contained in the local part
		without being treated as the "end" of the local part, they need to be
		prepended with a backslash. Additionally, for a backslash to be
		contained in the local part without being considered an "escape"
		character, it should be prepended with another backslash.</li>
	<li><code>""@arlith.com</code> - Quoted local part with no content.
		Arlith will accept this email as valid. It considers any string inside
		the double quotes, that is properly escaped, to be a valid local-part.</li>
	<li><code>"weird characters in quotes: ((;:'\"\\"@arlith.com</code> -
		Quoted local part with otherwise-illegal characters. Some of these
		characters, including <code>(</code>, would not be valid in the local
		part without double quotations. Since the local part is quoted in this
		example, the characters can be used in the local part. Note that
		Arlith does <em>not</em> consider comments in the local part or domain
		of an email address.</li>
	<li><code>legal-localpart-chars!#$%^&@arlith.com</code> - Normal local
		part with unusual (but legal) characters. According to the production
		rule above (for <code class="production">local-part-char</code>), the
		characters used in this example's local part do not need to be quoted
		to be valid.</li>
	<li><code>!.#.$.%.^.&@arlith.com</code> - Unusual (but legal) chars
		separated by periods. Apart from the periods, each of these characters
		is, again, contained in <code class="production">local-part-char</code>
		above, so is valid. The periods are allowed to "split" the string <code>!#$%^&</code>
		as a delimiter, which is demonstrated in this example.</li>
</ul>
<p>Examples of email addresses with malformed local parts include:</p>
<ul>
	<li><code>@arlith.com</code> - No local part.</li>
	<li><code>.pala@arlith.com</code> - The local part can't begin with a
		period.</li>
	<li><code>pala.@arlith.com</code> - The local part can't end with a
		period, either.</li>
	<li><code>pala..nath@arlith.com</code> - The local part can't have two
		adjacent periods.</li>
	<li><code>"a"b"c"@arlith.com</code> - The local part of this email
		address is considered to be the characters <code>"a"</code>, as these
		make up a whole, quoted string. The characters <code>b"c"</code> after
		those, all the way up to the <code>@</code> symbol, are considered to
		"separate" the local part from the <code>@</code> symbol, and are not
		allowed.</li>
	<li><code>"abc\"@arlith.com</code> - The entire string in this case is
		considered to be the local part. The backslash before the second
		quotation mark "escapes" that quotation mark, causing it to simply be
		a part of the local part. The local part remains unterminated because
		there's no non-escaped double quotation character to match with the
		very first character in the email address. If another quotation mark
		were added after, such as in: <code>"abc\""@arlith.com</code>, the
		email address would then be valid.</li>
	<li><code>(abc)@arlith.com</code> - This local part is not quoted but
		contains characters that are not allowed (the <code>(</code> and <code>)</code>
		characters).</li>
</ul>
<p>
	The <code class="production">domain</code> portion can either be an IP
	address or an actual domain name.
</p>
<h3>Domain Name</h3>
<p>
	<code class="described-production">domain-name</code>s are used to
	represent an actual domain name in Arlith. Currently, Arlith will
	accept any sequence of two or more <i>domain labels</i> separated by
	periods (<code>.</code> chars), such that no domain label begins or
	ends with a hyphen. Domain labels can contain any letter or decimal
	digit, and can contain hyphens.<sup info=1></sup><span info=1>Normal
		email addresses are actually allowed to have single-label domain
		names, but Arlith does not allow this. Single-label domain names are
		commonly used for referring to servers such as <code>localhost</code>.
	</span>
</p>
<h3>IPv4</h3>
<p>
	Arlith supports IPv4 addresses specified using decimal digits in the
	standard format. Each period-delimited octet is allowed to contain any
	one decimal number from <code>0</code> to <code>255</code>. Note that
	Arlith does <b>not</b> allow users to prepend <code>0</code>s in front
	of an octet; the only case where the leftmost digit of an IPv4 octet
	may be <code>0</code> is when the octet's value is <code>0</code>
	itself.<sup info=2></sup><span info=2>The reason for this is because
		many IP software systems treat octets with a <code>0</code> prefix to
		be written in octal notation. One notable example is software that
		delegates parsing IP addresses to the <code>ip_addr</code> function in
		C, which is used by utilities such as Microsoft Windows's <code>ping</code>
		script. In such systems, the user may enter <code>021</code> to refer
		to the decimal number <code>19</code>, so, for example, <code>ping
			021.0.0.1</code> would ping <code>17.0.0.1</code>. <code>ip_addr</code>
		also supports hexadecimal values, allowing the user to enter an ip
		address such as <code>0xa.012.34.0xF</code> which resolves to the IP
		address: <code>10.10.34.15</code>. Arlith may, in the future, support
		these notations for IPv4 octets.
	</span>
</p>
<h3>IPv6</h3>
<p>
	Arlith does not currently support IPv6 notation. If brackets are used
	for the domain and the beginning of the string contained by those
	brackets is <code>ipv6::</code> in any capitalization, Arlith will
	reject the email address, citing IPv6 usage.
</p>

<h3>General Constraints</h3>
<p>
	Each label in a domain name is limited to <code>63</code> characters in
	length. Additionally, the entire domain part, assuming a domain name is
	used, is limited to <code>253</code> characters in length.
</p>

<h2>Production Rule Syntax</h2>
<p>Each part of the rules above is color coded:</p>
<ul>
	<li class="production">Non-Terminals</li>
	<li class="chars">Character Literal Values and Character Literal Ranges</li>
	<li class="described-production">Described Non-Terminals</li>
</ul>
<h3>Character Literals &amp; Ranges</h3>
<p>
	Character literal values are used to represent literal characters. They
	can either be contained within single quotes, e.g. <span class="chars">'Q'</span>,
	or can be a numeric, decimal character value. Character ranges are
	composed of two character literal values, the first lesser than the
	second, separated by a hyphen. For example, <span class="chars">'A'-'C'</span>,
	<span class="chars">65-67</span>, <span class="chars">'A'-67</span>. A
	Character range is essentially shorthand to denote that any character
	between the two endpoints of the range can take the place of the range
	in the production expression.
</p>
<h3>Described Non-Terminals</h3>
<p>Described Non-Terminals are non-terminals whose syntax is explicitly
	described in English rather than through more production rules.</p>
<h3>Syntactical Content</h3>
<p>
	There are three main types of syntactical content to consider. The <code>/</code>
	character in a rule denotes that the non-terminal can be expanded to
	either one of the two arguments surrounding the <code>/</code>. A pair
	of brackets denotes that its content is optional. A pair of parentheses
	groups multiple elements into one element for use under e.g. Kleene
	Stars or the <code>/</code>.
</p>
<?php

t();