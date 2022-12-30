<?php h("Arlith Wiki - Editing the wiki");?><h1>Wiki Editing</h1>
<p>
	The wiki is conceptually organized into <i>pages</i>, each of which
	expounds information on a specific topic. Editing the wiki consists of
	adding new pages or editing existing pages. Each page in the wiki is
	programmatically represented by a sub-directory of the <code>arlith.net</code>
	folder in the filesystem served by the server, (contained within the
	wiki's source code repository). A page's source code is contained
	inside an <code>index</code> file resource in that sub-directory. For
	example, the page <i><a href=".">Wiki Editing</a></i> is represented by
	the folder <code>arlith.net/editing/</code> that resides on the server,
	and its source code is specified in the file <code>arlith.net/editing/index.php</code>.
</p>
<p>
	Pages are referenced in an <a href="/index"><i>index</i> page</a>. The
	index page is considered an exhaustive list of all the pages on the
	wiki.
</p>
<p>
	The formal process for adding a page is to create its <code>index.php</code>
	file in its directory, specify in the file that the wiki template
	should be applied, and then to fill out the page's contents.
</p>
<h2>Styled HTML Elements</h2>
<p>The wiki's content is written in HTML and is styled with a
	wiki-themed CSS stylesheet. Not all HTML elements are handled by the
	stylesheet. This section shows what elements are styled by the wiki's
	stylesheet and how they appear.</p>
<h3>Headers</h3>
<p>
	Headers come in 6 different <i>levels</i>, which affect their size and
	their semantic importance on a page.
</p>
<table>
	<tr>
		<th>HTML</th>
		<th>Rendered Content</th>
	</tr>
	<tr>
		<td><pre><code>&lt;h1&gt;Heading 1&lt;/h1&gt;
&lt;h2&gt;Heading 2&lt;/h2&gt;
&lt;h3&gt;Heading 3&lt;/h3&gt;
&lt;h4&gt;Heading 4&lt;/h4&gt;
&lt;h5&gt;Heading 5&lt;/h5&gt;
&lt;h6&gt;Heading 6&lt;/h6&gt;</code></pre></td>
		<td><h1>Heading 1</h1>
			<h2>Heading 2</h2>
			<h3>Heading 3</h3>
			<h4>Heading 4</h4>
			<h5>Heading 5</h5>
			<h6>Heading 6</h6></td>
	</tr>
</table>
<h4>Presentational Notes</h4>
<ul>
	<li>Headings <code>&lt;h1&gt;</code> and <code>&lt;h2&gt;</code> have a
		serif font and have a separator line immediately under them.
	</li>
	<li>All other (lesser) headings are sans-serif, smaller, and have no
		line.</li>
</ul>
<h4>Semantic Notes</h4>
<ul>
	<li>Conventional wiki semantics dictate that the top of every page have
		a level 1 heading which defines the page's title.</li>
</ul>
<h3>Code</h3>
<p>
	Code elements (<code>&lt;code&gt;...&lt;/code&gt;</code>) are intended
	to format code. Code elements render with a slightly lighter grey
	background and a thin border. Code can be displayed in an <i>inline</i>
	format (using a <code>&lt;code&gt;</code> element inline with text) or
	in a <i>block</i> format.
</p>
<h4>Inline Code</h4>
<p>
	Inline code has a very slim padding; the border is very close to the
	text and the border and background follow and surround the text. Inline
	code is styled with line-wrappping <i>disabled</i> by default, so an
	inline code block will not be split so that text can "wrap" to the next
	line.
</p>
<table>
	<tr>
		<th>HTML</th>
		<th>Rendered Content</th>
	</tr>
	<tr>
		<td><pre><code>The &lt;code&gt;public&lt;/code&gt; keyword is the
most ubiquitous access-modifier in Java, in front of both
&lt;code&gt;protected&lt;/code&gt; and
&lt;code&gt;private&lt;/code&gt;, prefixing almost every class,...</code></pre></td>
		<td>The <code>public</code> keyword is the most ubiquitous
			access-modifier in Java, in front of both <code>protected</code> and
			<code>private</code>, prefixing almost every class,...
		</td>
	</tr>
</table>
<h4>Block Code</h4>
<p>Block formatted code renders in a padded, rectangular element. Block
	formatted code is rendered with the same spacing, tabulation, and other
	whitespace as is contained within the block formatted source code.</p>
<table>
	<tr>
		<th>HTML</th>
		<th>Rendered Content</th>
	</tr>
	<tr>
		<td><pre><code>&lt;pre&gt;&lt;code&gt;public int x = 5;
private int j = 10;&lt;/code&gt;&lt;/pre&gt;</code></pre></td>
		<td><pre
			style="margin: unset; background-color: #ffffff0a; border: 1px solid #444;"><code>public int x = 5;
private int j = 10;</code></pre></td>
	</tr>
</table>

<?php t();