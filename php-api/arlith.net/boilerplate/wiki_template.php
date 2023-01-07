<?php

/**
 * The first part of the head function. The head function, h(string), invokes this function and then h2() (which is the second part of the head function). This function prints the beginning tags of a document and then opens the head element, prints all of the boilerplate header content, and then returns. It does not close the head element.
 * 
 * Pages wishing to include custom content in the head element can use this function, print their custom content, then use the h2() function.
 * 
 * @param string $page_title The title of the page, to be echoed into the title element.
 */
function h1(string $page_title)
{
    ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/index.css">
<meta charset="UTF-8">
<title><?php echo$page_title;?></title>
<script type="text/javascript">
window.onload = function() {
    for (let img of document.querySelectorAll("figure>img")) {
    	let fig = img.parentNode;
        img.onclick = function() {
        console.log(fig.classList);
        	if(fig.classList.contains("expanded"))
        		fig.classList.remove("expanded");
        	else
        		fig.classList.add("expanded");
        }
	}

	for (let ref of document.querySelectorAll("p>sup[info]")) {
		let element = document.querySelector("p>span[info='"+ref.getAttribute("info")+"']");
		ref.onclick = function() {
    		if (element.classList.contains("visible"))
    			element.classList.remove("visible");
    		else
    			element.classList.add("visible");
		};
	}
}
</script><?php
}

function h2()
{
    ?>
</head>
<body><?php
}

/**
 * The head function, which writes the opening html and doctype tags, writes the whole page's head element, and writes the opening body tag after.
 * This function writes a title element into the head element it prints and echoes the contents of the provided $page_title parameter into the title element.
 *
 * @param string $page_title
 *            The title of the page, to be echoed into the title element.
 */
function h(string $page_title)
{
    h1($page_title);
    h2();
}

/**
 * The tail function, which writes the closing body and html tags and ends the wiki template.
 */
function t()
{
    ?>
</body>
</html><?php
}