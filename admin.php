<?php
require("config.php");
$juConfig['launch'] = array('router_prefilter' => array(array('syauser','check'),),);
$juConfig['ext']['view_admin']= 'admin';
$juConfig['view']['config']['template_dir'] = APP_PATH.'/source/admin/template';
$juConfig['controller_path'] = APP_PATH.'/source/admin';

require(JU_PATH."/sys.php");
import(APP_PATH.'/include/fun/fun_admin.php');
spRun();