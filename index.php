<?php

require_once('page_utils.php');

$home = page_utils::get_home_path($_GET["page"]);

echo(page_utils::get_head($home));
echo(page_utils::get_header($home));
echo(page_utils::get_nav($home));
echo(page_utils::get_content($_GET["page"]));
echo(page_utils::get_footer($home));

?>
