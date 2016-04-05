<?PHP
require_once("./include/fg_membersite.php");

$cancel = new FGMembersite();

//Provide your site name here
$cancel->SetWebsiteName('user11.com');

//Provide the email address where you want to get notifications
$cancel->SetAdminEmail('user11@user11.com');

//Provide your database login details here:
//hostname, user name, password, database name and table name
//note that the script will create the table (for example, fgusers in this case)
//by itself on submitting register.php for the first time
$cancel->InitDB(/*hostname*/'localhost',
                      /*username*/'root',
                      /*password*/'',
                      /*database name*/'kingsfield_database',
                      /*table name*/'tb_guest');

//For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
$cancel->SetRandomKey('qSRcVS6DrTzrPvr');

?>