<?php
/*
 * Script:    DataTables server-side script for PHP and MySQL
 * Copyright: 2012 - John Becker, Beckersoft, Inc.
 * Copyright: 2010 - Allan Jardine
 * License:   GPL v2 or BSD (3-point)
 */
  
class TableData {
 
 	private $_db;
	public function __construct() {
		try {
			$user = "slpuser"; 
			$passwd = "turtles9"; 
			$host = "localhost"; 
			$database = "slponline";
		
		    $this->_db = new PDO('mysql:host='.$host.';dbname='.$database, $user, $passwd, array(PDO::ATTR_PERSISTENT => true));
		} catch (PDOException $e) {
		    error_log("Failed to connect to database: ".$e->getMessage());
		}		
		session_start(); 
$now = time();
if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
    session_unset();
    session_destroy();
    session_start();
}
$_SESSION['discard_after'] = $now + 1800;
if(empty($_SESSION['emailaddress'])) { 
    header("Location: http://slp.ph/"); 
    die("Redirecting to login.."); 
}
	}
	public function get($table, $index_column, $columns) {
		// Paging
		$sLimit = "";
		if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ) {
			$sLimit = "LIMIT ".intval( $_GET['iDisplayStart'] ).", ".intval( $_GET['iDisplayLength'] );
		}
		
		// Ordering
		$sOrder = "";
		if ( isset( $_GET['iSortCol_0'] ) ) {
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ ) {
				if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" ) {
					$sortDir = (strcasecmp($_GET['sSortDir_'.$i], 'ASC') == 0) ? 'ASC' : 'DESC';
					$sOrder .= "`".$columns[ intval( $_GET['iSortCol_'.$i] ) ]."` ". $sortDir .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" ) {
				$sOrder = "";
			}
		}
		
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		$sWhere = "";
		if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" ) {
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($columns) ; $i++ ) {
				if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" ) {
					$sWhere .= "`".$columns[$i]."` LIKE :search OR ";
				}
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		
		// Individual column filtering
		for ( $i=0 ; $i<count($columns) ; $i++ ) {
			if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' ) {
				if ( $sWhere == "" ) {
					$sWhere = "WHERE ";
				}
				else {
					$sWhere .= " AND ";
				}
				$sWhere .= "`".$columns[$i]."` LIKE :search".$i." ";
			}
		}
		
		// SQL queries get data to display
		if ($_SESSION['filter'] == "NPMO") {
			$sQuery = "SELECT m.id, GROUP_CONCAT(DISTINCT z.sector SEPARATOR ', ') tag, m.jobname, m.numopenings, m.region, m.province, m.status, COUNT(j.id) as curropen FROM PRTdemand m LEFT JOIN PRTdemandtags z ON m.id=z.demandid LEFT JOIN PRTsupply j ON m.id=j.engagedto GROUP BY m.id";
		} else {
			$sQuery = "SELECT m.id, GROUP_CONCAT(DISTINCT z.sector SEPARATOR ', ') tag, m.jobname, m.numopenings, m.region, m.province, m.status, COUNT(j.id) as curropen FROM PRTdemand m LEFT JOIN PRTdemandtags z ON m.id=z.demandid LEFT JOIN PRTsupply j ON m.id=j.engagedto WHERE m.region = '".$_SESSION['filter']."' GROUP BY m.id";
		}
		$statement = $this->_db->prepare($sQuery);
		
		// Bind parameters
		if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" ) {
			$statement->bindValue(':search', '%'.$_GET['sSearch'].'%', PDO::PARAM_STR);
		}
		for ( $i=0 ; $i<count($columns) ; $i++ ) {
			if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' ) {
				$statement->bindValue(':search'.$i, '%'.$_GET['sSearch_'.$i].'%', PDO::PARAM_STR);
			}
		}
		$statement->execute();
		$rResult = $statement->fetchAll();
		
		$iFilteredTotal = current($this->_db->query('SELECT FOUND_ROWS()')->fetch());
		
		// Get total number of rows in table
		$sQuery = "SELECT COUNT(`".$index_column."`) FROM `".$table."`";
		$iTotal = current($this->_db->query($sQuery)->fetch());
		
		// Output
		$output = array(
			"sEcho" => intval($_GET['sEcho']),
			"iTotalRecords" => $iTotal,
			"iTotalDisplayRecords" => $iFilteredTotal,
			"aaData" => array()
		);
		
		// Return array of values
		foreach($rResult as $aRow) {
			$row = array();			
			for ( $i = 0; $i < count($columns); $i++ ) {
				if ( $columns[$i] == "version" ) {
					// Special output formatting for 'version' column
					$row[] = ($aRow[ $columns[$i] ]=="0") ? '-' : $aRow[ $columns[$i] ];
				}
				else if ( $columns[$i] != ' ' ) {
					$row[] = $aRow[ $columns[$i] ];
				}
			}
			$output['aaData'][] = $row;
		}
		
		echo json_encode( $output );
	}
}
header('Pragma: no-cache');
header('Cache-Control: no-store, no-cache, must-revalidate');
// Create instance of TableData class

$table_data = new TableData();
// Get the data
$table_data->get('PRTdemand', 'id', array('id', 'jobname', 'tag', 'numopenings', 'province', 'status', 'curropen'));
/*
 * Alternatively, you may want to use the same class for several differnt tables for different pages.
 * By adding something similar to the following to your .htaccess file you can control this a little more...
 *
 * RewriteRule ^pagename/data/?$ data.php?_page=PAGENAME [L,NC,QSA]
 *
 
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_REQUEST['_page'])) {
        	if($_REQUEST['_page'] === 'PAGENAME') {
	            $table_data->get('table_name', 'index_column', array('column1', 'column2', 'columnN'));
	        }
        }
        break;
    default:
        header('HTTP/1.1 400 Bad Request');
}
*/
?>