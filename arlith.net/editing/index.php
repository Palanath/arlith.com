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

<?php t();