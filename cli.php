<?php

header('Content-type: text/html; charset="utf-8"');

session_start();
define('S_NAME', 'mysql_cli');

function connect() {
	if ( isset($_SESSION[S_NAME]['host'], $_SESSION[S_NAME]['user'], $_SESSION[S_NAME]['pass']) && @mysql_connect($_SESSION[S_NAME]['host'], $_SESSION[S_NAME]['user'], $_SESSION[S_NAME]['pass']) ) {
		if ( isset($_SESSION[S_NAME]['db']) ) {
			if ( @mysql_select_db($_SESSION[S_NAME]['db']) ) {
				mysql_query("SET NAMES 'utf8'");
			}
		}
		return true;
	}
	return false;
}

$g_szSource = isset($_SESSION[S_NAME]['method']) && 'POST' == $_SESSION[S_NAME]['method'] ? 'POST' : 'GET';
$g_arrSource = 'POST' == $g_szSource ? $_POST : $_GET;

if ( isset($_GET['set_method']) ) {
	$_SESSION[S_NAME]['method'] = strtoupper($_GET['set_method']);
	header('Location: cli.php');
	exit;
}

if ( isset($g_arrSource['q']) && 0 === strpos(strtolower(trim($g_arrSource['q'])), 'login ') )
{
	$arrData = explode(' ', trim($g_arrSource['q']));
	if ( 3 == count($arrData) ) {
		$_SESSION[S_NAME]['host'] = 'localhost';
		$_SESSION[S_NAME]['user'] = $arrData[1];
		$_SESSION[S_NAME]['pass'] = $arrData[2];
	}
	else if ( 4 == count($arrData) ) {
		$_SESSION[S_NAME]['host'] = $arrData[1];
		$_SESSION[S_NAME]['user'] = $arrData[2];
		$_SESSION[S_NAME]['pass'] = $arrData[3];
	}

	$szMsg = '';
	if ( !connect() ) {
//		$szMsg = '?msg=INVALID_LOGIN';
		$_SESSION[S_NAME] = array();
	}

	header('Location: cli.php'.$szMsg);
	exit;
}

if ( isset($g_arrSource['q']) && 0 === strpos(strtolower($g_arrSource['q']), 'use ') )
{
	$arrData = explode(' ', trim($g_arrSource['q']));
	$_SESSION[S_NAME]['db'] = rtrim($arrData[1], ';');

	header('Location: cli.php');
	exit;
}


$bConnected = connect();


if ( isset($_POST['q'], $_POST['ajax_refresh']) ) {
	exit(htmlTable(mysql_query($_POST['q'])));
}


// Login info
$szLogin = '[Not connected]';
if ( $bConnected ) {
	$szUser = mysql_result(mysql_query('SELECT USER();'), 0);
	$szDatabase = mysql_result(mysql_query('SELECT DATABASE();'), 0);
	$szLogin = '[Connected as `' . $szUser . '` @ `'.$_SESSION[S_NAME]['host'].'`'.( $szDatabase ? ' / `'.$szDatabase.'`' : '' ).']';
}

?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
<title><?php if ( isset($g_arrSource['q']) && trim($g_arrSource['q']) ) { echo trim($g_arrSource['q']); } ?></title>
<script src="/js/mootools_1_11.js"></script>
<style>
* { box-sizing: border-box; }
textarea.query { width: 100%; resize: vertical; }
.resultset {
	font-family: 'courier new';
	font-size: 10pt;
	border-collapse: collapse;
}
.resultset th,
.resultset td {
	border: solid 2px #bbb;
	padding: 4px;
}
.resultset th {
	color: #000;
	background: #eee;
}
.resultset td {
	white-space: pre;
	vertical-align: top;
	color: #555;
}
#favqs a {
	color:lightblue;
	text-decoration:none;
}
#favqs a:hover, #favqs a:focus {
	color:darkblue;
}
</style>
<script>
function tkh(o, e) {
	e = e || window.event;
	if ( 13 == e.keyCode && ( ';' == o.value.substr(o.value.length-1) || 0 == o.value.toLowerCase().indexOf('login ') || 0 == o.value.toLowerCase().indexOf('use ') ) ) {
		o.form.submit();
		return false;
	}
}
</script>
</head>

<body>

<form method="<?=$g_szSource?>" action>
	<textarea autofocus id="q" class="query" onkeydown="return tkh(this, event);" rows="8" name="q"><?php if ( isset($g_arrSource['q']) ) { echo $g_arrSource['q']; } else if ( !$bConnected ) { echo 'LOGIN root'; } else if ( $bConnected && !$szDatabase ) { echo 'use test'; } ?></textarea><br />
	<?php echo $szLogin; ?><br />
	<input type="submit" value="Execute" /> &nbsp; <input type="reset" value="reset" onclick="this.form.elements['q'].select();" />
</form>

<script>
(function(ta) {
	var rows = parseInt(ta.attr('rows'));
	while ( ta.clientHeight < ta.scrollHeight ) {
		ta.attr('rows', ++rows);
	}
})($('q'));
</script>

<?php

if ( isset($g_arrSource['q']) && trim($g_arrSource['q']) )
{
	$szSqlQuery = trim($g_arrSource['q']);
	$arrQueries = explode(";\r\n\r\n", $szSqlQuery);
	$szSqlQuery = trim(array_pop($arrQueries));
//exit($szSqlQuery);

	// Do support queries
	foreach ( $arrQueries AS $szSupportQuery ) {
		@mysql_query($szSupportQuery);
	}

	$fUtcStart = microtime(true);
	$q = @mysql_query($szSqlQuery);
	$fQueryExecTime = microtime(true) - $fUtcStart;

	echo '<pre>mysql> '.htmlspecialchars($szSqlQuery).'</pre>'."\n";

	if ( !$q )
	{
		echo '<pre>Error: '.htmlspecialchars(mysql_error()).'</pre>';
	}
	else
	{
		if ( ($fp = @fopen('queries.log', 'a')) ) {
			fwrite($fp, $szSqlQuery."\n\n");
			fclose($fp);
		}
		if ( !is_resource($q) )
		{
			echo '<pre>';
			var_dump($q);
			echo mysql_affected_rows().' affected rows.';
			$szTable = null;
			if ( 0 === strpos(strtolower($szSqlQuery), 'insert into ') )
			{
				$szTable = trim(substr($szSqlQuery, strlen('insert into '), strpos($szSqlQuery, ' ', strlen('insert into '))-strlen('insert into ')));
			}
			else if ( 0 === strpos(strtolower($szSqlQuery), 'delete from ') )
			{
				$szTable = trim(substr($szSqlQuery, strlen('delete from '), strpos($szSqlQuery, ' ', strlen('delete from '))-strlen('delete from ')));
			}
			else if ( 0 === strpos(strtolower($szSqlQuery), 'update ') )
			{
				$szTable = trim(substr($szSqlQuery, strlen('update '), strpos($szSqlQuery, ' ', strlen('update '))-strlen('update ')));
			}
			else if ( 0 === strpos(strtolower($szSqlQuery), 'replace into ') )
			{
				$szTable = trim(substr($szSqlQuery, strlen('replace into '), strpos($szSqlQuery, ' ', strlen('replace into '))-strlen('replace into ')));
			}
	
			if ( !empty($szTable) ) {
				$q = @mysql_query('SELECT * FROM '.$szTable.' LIMIT 250;');
			}
			echo '</pre>';
		}
		else
		{
			if ( !mysql_num_rows($q) )
			{
				echo '<pre>Empty set. ';
			}
			else
			{
				echo '<div id="resultsettable">'.htmlTable($q).'</div>';
			}
			echo '('.number_format($fQueryExecTime, 4).' sec)</pre>';
		}
	}
	echo '<br />';
}

?>
<p><a href="pgsql-cli.php">To PGSQL</a></p>
<p>Fav queries: (<a href="#" onclick="var q=prompt('Query:', '');if(q){ var sqs=getFavQs(); sqs.push(q); localStorage.setItem('favqs', JSON.stringify(sqs));listFavQs(); }return false;">new</a>)</p>
<ul id="favqs"></ul>
<script>
function getFavQs() {
	return JSON.parse(localStorage.getItem('favqs')) || [];
}
function listFavQs() {
	$('favqs').empty();
	getFavQs().each(function(q, i) {
		$('favqs').append(
			(new Element('li')).append(
				(new Element('a')).attr('href', '').setHTML(q).addEvent('click', function(e){
					new Event(e).stop();
					with(document.querySelector('textarea[name="q"]')){
						value = this.innerHTML;
						form.submit();
					}
					return false;
				})
			).append(
				document.createTextNode(' (')
			).append(
				(new Element('a')).attr({'href': '', 'index': i}).setHTML('x').addEvent('click', function(e){
					new Event(e).stop();
					var i = parseInt($(this).attr('index'));
					if ( !isNaN(i) ) {
						var sqs = getFavQs();
						sqs.splice(i, 1);
						localStorage.setItem('favqs', JSON.stringify(sqs));
						listFavQs();
					}
					return false;
				})
			).append(
				document.createTextNode(')')
			)
		);
	});
}
listFavQs();
</script>

</body>

</html>
<?php

function htmlTable($q) {
	$n = false;
	$szHtml = '<table class="resultset">';
	while ( $r = mysql_fetch_row($q) ) {
		if ( !$n ) {
//			$szHtml .= $szHorLine = '<tr>'.str_repeat('<th>+</th><td class="bg"></td>', count($r)).'<th>+</th></tr>';
			$szHtml .= '<tr>';
			foreach ( $r AS $iField => $szValue ) {
//				$szHtml .= '<td>|</td>';
				$szHtml .= '<th align="left" nowrap="1" wrap="off">'.htmlspecialchars(mysql_field_name($q, $iField)).'</th>';
			}
//			$szHtml .= '<td>|</td>';
			$szHtml .= '</tr>';
//			$szHtml .= $szHorLine;
		}
		$szHtml .= '<tr>';
		foreach ( $r AS $szValue ) {
			if ( $szValue === null ) {
				$szPrintValue = '<i>NULL</i>';
				$szAlign = '';
			}
			else if ( $szValue === chr(0) ) {
				$szPrintValue = '<i>OFF</i>';
				$szAlign = ' align="center"';
			}
			else if ( $szValue === chr(1) ) {
				$szPrintValue = '<i>ON</i>';
				$szAlign = ' align="center"';
			}
			else if ( '' === $szValue ) {
				$szPrintValue = '&nbsp;';
			}
			else {
				$szPrintValue = htmlspecialchars($szValue);
				$szAlign = is_numeric($szValue) ? ' align="right"' : '';
			}
//			$szHtml .= '<td>|</td>';
			$szHtml .= '<td wrap="off" nowrap="1"'.$szAlign.'>'.$szPrintValue.'</td>';
		}
//		$szHtml .= '<td>|</td>';
		$szHtml .= '</tr>';
		$n = true;
	}
//	$szHtml .= $szHorLine;
	$szHtml .= '</table>'."\n".mysql_num_rows($q).' rows in set. ';
	return $szHtml;
}

?>