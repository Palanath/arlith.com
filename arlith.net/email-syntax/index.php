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
<p>This page documents what Arlith considers to be a valid email
	address. Valid email addresses can be provided through the client when
	registering for or logging into an account.</p>
<h2>Production Rules</h2>
<p>
	Following are production rules that describe how Arlith parses and
	validates email addresses. The syntax used in the below code block is
	similar to that used by RFC, but with color coding and some variations.
	The syntax of what Arlith considers an actual email address (the <em>meaning</em>
	of the below code block) is also similar to that defined by RFC, but
	with some variations (e.g., obsolete syntax is not considered by
	Arlith). For details on how to interpret the below code block, see
	underneath it.
</p>
<pre><code><span class="production">email-address</span>   =   <span
		class="production">local-part</span> <span class="chars">'@'</span> <span
		class="production">domain</span>
<span class="production">local-part</span>      =   <span
		class="production">dot-atom</span> / <span
		class="described-production">quoted-string</span>
<span class="production">domain</span>          =   <span
		class="described-production">domain-name</span> / <span class="chars">'['</span><span
		class="production">ip-addr</span><span class="chars">']'</span>
<span class="production">ip-addr</span>         =   <span
		class="described-production">ip-v4</span> / <span
		class="described-production"
		style="color: red; text-decoration: line-through;">ip-v6</span>
<span class="production">dot-atom</span>        =   <span
		class="production">atext</span><sup class="repl">+</sup> (<span
		class="chars">'.'</span> <span class="production">atext</span><sup
		class="repl">+</sup>)<sup class="repl">*</sup>
<span class="production">atext</span>           =   <span class="chars">'a'-'z'</span> / <span
		class="chars">'A'-'Z'</span> / <span class="chars">'0'-'9'</span>
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
<p>
	Quoted strings are strings beginning and ending with double-quotation
	marks (<code>"</code>).<sup info=1></sup> Quoted strings may contain
	any character, but every contained quotation mark, that is not the very
	first or last character, must be "escaped" by being prepended with one
	backslash (<code>\</code>). Additionally, only all backslashes whose
	purposes are not to escape a quotation character or another backslash,
	must be, themselves, escaped. (This rule is only partially enforced.<sup
		info=2></sup>)<span info=1>RFC notes that the local-part of an email
		address should be interpreted by the mail server. This means that
		unusual email addresses, such as <code>"john.doe"@gmail.com</code>
		will be syntactically validated by Arlith, but considered literally.
		In the case of <code>"john.doe"@gmail.com</code>, when sending an
		email to such an address, the recipient that would be used is
		literally <code>"john.doe"@gmail.com</code>, with quotes, which might
		not be what one expects. The corresponding mail server (gmail, in this
		instance) may reject the request as a result of the email address
		having quotations. In essence, characters that seem necessary only for
		syntactical reasons (like backslashes meant for escaping) will not be
		removed once the email address is parsed. Functionality to allow the
		user to manipulate this better may be added in the future.
	</span><span info=2>Arlith requires that literal backslashes in quoted
		local parts be escaped, but does not reject emails which use
		backslashes to "escape" characters which need not be escaped. For
		example, according to the above requirements, the email address <code>"joe\shmoe"@arlith.org</code>
		is syntactically invalid, because the <code>\</code> character
		"escapes" the <code>s</code> even though the <code>s</code> does not
		need escaping. Arlith, however, will accept the string as a valid
		email address.
	</span>
</p>
<p>
	Colloquially, an email address is the <code>local-part</code> followed
	by an <code>@</code> symbol and a <code>domain</code> address to locate
	the mail server. The local-part can be either a quoted string, allowing
	it to contain essentially any character, or a <code>dot-atom</code>. A
	dot-atom can be any sequence of <code>atext</code> characters with dot
	characters (<code>.</code>) <i>in between</i> (not at either endpoint),
	but <i>not consecutively</i>; (two <code>.</code> characters cannot
	touch).
</p>
<p>
	Domain names should be any valid domain name. Currently, Arlith parses
	this by simply checking for at least two parts, each separated by a dot
	(<code>.</code>) (technically referred to as <i>labels</i>). Each part
	should be composed of alphanumeric characters and hyphens, but such
	that no part should begin or end with a hyphen. Furthermore, no part
	should exceed 63 characters in length and a whole domain name should
	not exceed 253 characters.
</p>
<p>
	IPv4 addresses should be a valid IPv4 string. The <code>ip-v6</code>
	non-terminal in the rules above expands to any valid IPv6 address with
	the prefix <code>IPv6</code> in front. The <code>ip-v6</code> address
	non-terminal is currently not supported by Arlith.
</p>
<p>Each part of the rules above is color coded:</p>
<ul>
	<li class="production">Non-Terminals</li>
	<li class="chars">Character Literal Values and Character Literal Ranges</li>
	<li class="described-production">Described Non-Terminals</li>
	<li class="repl">"Replicators" (e.g. <i>Kleene Star</i>, *)
	</li>
	<li>Syntactical Content</li>
	<li><span class="optional">Optional Content (Hover Over Me)</span></li>
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