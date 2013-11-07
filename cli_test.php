<?php

header('Content-type: text/plain');

// var_dump(`mysql -u root -p boele`);
// var_dump(`mysql -e "use mysql"`);
echo `mysql -u root -pPASSWORD mysql -e "select user, host from user"`;
