<?php
require("config.php");
$juConfig['view']['config']['template_dir'] = APP_PATH.'/template/'.$juConfig['ext']['view_themes'];
require(JU_PATH."/sys.php");
spRun();