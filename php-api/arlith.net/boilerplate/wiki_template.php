<?php

/**
 * The head function, which writes the opening html and doctype tags, writes the whole page's head element, and writes the opening body tag after. This function writes a title element into the head element it prints and echoes the contents of the provided $page_title parameter into the title element.
 * 
 * @param string $page_title The title of the page, to be echoed into the title element.
 */
function h(string $page_title)
{
    ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/index.css">
<meta charset="UTF-8">
<title><?php echo$page_title;?></title>
</head>
<body>
<?php

}

/**
 * The tail function, which writes the closing body and html tags and ends the wiki template.
 */
function t()
{
    ?>
</body>
</html><?php }