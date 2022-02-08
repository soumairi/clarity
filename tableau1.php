<html>
	  <head>
		<title>Dashboard Clarity</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="jQuery 1.7.2.js" ></script>
		<script type="text/javascript" src="html2CSV.js" ></script>

	  </head>
	  <body>
	  		<center><img src="img/logo.jpg" width=150></center>
		
<?php
include('connect.php'); 

//echo $_POST['valeur'];
//echo '<br><br>';
//echo $_POST['date'];
//echo '<br><br>';
$date1 = $_GET['date1'];
$date2 = $_GET['date2'];
$now = date ("y-m-d");




//TIckets NTV
$sql1l = 'SELECT COUNT(*) as new  FROM data  WHERE  created_date >= "'.$date1.'" AND created_date<= "'.$date2.' 23:59:00" AND (category = "NTV - NSK" OR category = "NTV - YMS") AND Urgency ="Low"';
$sql1m = 'SELECT COUNT(*) as new  FROM data  WHERE  created_date >= "'.$date1.'" AND created_date<= "'.$date2.' 23:59:00" AND (category = "NTV - NSK" OR category = "NTV - YMS") AND Urgency ="Medium"';
$sql1h = 'SELECT COUNT(*) as new  FROM data  WHERE  created_date >= "'.$date1.'" AND created_date<= "'.$date2.' 23:59:00" AND (category = "NTV - NSK" OR category = "NTV - YMS") AND Urgency ="High"';
$sql1c = 'SELECT COUNT(*) as new  FROM data  WHERE  created_date >= "'.$date1.'" AND created_date<= "'.$date2.' 23:59:00" AND (category = "NTV - NSK" OR category = "NTV - YMS") AND Urgency ="Critical"';
$sql2l = 'SELECT COUNT(*) as open FROM data  WHERE   (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated") AND (category = "NTV - NSK" OR category = "NTV - YMS") AND Urgency = "Low"';
$sql2m = 'SELECT COUNT(*) as open FROM data  WHERE   (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated") AND (category = "NTV - NSK" OR category = "NTV - YMS") AND Urgency = "Medium"';
$sql2h = 'SELECT COUNT(*) as open FROM data  WHERE   (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated") AND (category = "NTV - NSK" OR category = "NTV - YMS") AND Urgency = "High"';
$sql2c = 'SELECT COUNT(*) as open FROM data  WHERE   (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated") AND (category = "NTV - NSK" OR category = "NTV - YMS") AND Urgency = "Critical"';
$sql3l = 'SELECT COUNT(*) as resolved  FROM data  WHERE  resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND (category = "NTV - NSK" OR category = "NTV - YMS") AND Urgency = "Low"';
$sql3m = 'SELECT COUNT(*) as resolved  FROM data  WHERE  resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND (category = "NTV - NSK" OR category = "NTV - YMS") AND Urgency = "Medium"';
$sql3h = 'SELECT COUNT(*) as resolved  FROM data  WHERE  resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND (category = "NTV - NSK" OR category = "NTV - YMS") AND Urgency = "High"';
$sql3c = 'SELECT COUNT(*) as resolved  FROM data  WHERE  resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND (category = "NTV - NSK" OR category = "NTV - YMS") AND Urgency = "Critical"';

$sql4 = 'SELECT COUNT(*) as closed  FROM data  WHERE  status = "Closed" AND closure_date >= "'.$date1.'" AND closure_date<= "'.$date2.' 23:59:00" AND (category = "NTV - NSK" OR category = "NTV - YMS")';
$sql5lOK = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    (category = "NTV - NSK" OR category = "NTV - YMS")   AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and (datediff( owned_date, created_date) <=2) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql5lKO = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     (category = "NTV - NSK" OR category = "NTV - YMS")   AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql5mOK = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    (category = "NTV - NSK" OR category = "NTV - YMS")   AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and (datediff( owned_date, created_date) <=2) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql5mKO = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     (category = "NTV - NSK" OR category = "NTV - YMS")   AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" )  AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql5hOK = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    (category = "NTV - NSK" OR category = "NTV - YMS")   AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and (datediff( owned_date, created_date) <=2) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql5hKO = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     (category = "NTV - NSK" OR category = "NTV - YMS")   AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" )  AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6lOK = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    (category = "NTV - NSK" OR category = "NTV - YMS")   AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0))  <=15) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6lKO = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     (category = "NTV - NSK" OR category = "NTV - YMS")   AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6mOK = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    (category = "NTV - NSK" OR category = "NTV - YMS")   AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0))  <=10) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6mKO = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     (category = "NTV - NSK" OR category = "NTV - YMS")   AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" )  AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6hOK = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    (category = "NTV - NSK" OR category = "NTV - YMS")   AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0))  <=5) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6hKO = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     (category = "NTV - NSK" OR category = "NTV - YMS")   AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" )  AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql7 = 'SELECT COUNT(*) as billable  FROM data  WHERE  status = "Resolved" AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND facturable = "YES" AND (category = "NTV - NSK" OR category = "NTV - YMS")';
$sql8 = 'SELECT COUNT(*) as interne  FROM data  WHERE  status = "Resolved" AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND interne = "YES" AND (category = "NTV - NSK" OR category = "NTV - YMS")';

//TIckets CFF
$sql1Cl = 'SELECT COUNT(*) as new  FROM data  WHERE  created_date >= "'.$date1.'" AND created_date<= "'.$date2.' 23:59:00" AND category = "CFF - WDI" AND Urgency ="Low"';
$sql1Cm = 'SELECT COUNT(*) as new  FROM data  WHERE  created_date >= "'.$date1.'" AND created_date<= "'.$date2.' 23:59:00" AND category = "CFF - WDI" AND Urgency ="Medium"';
$sql1Ch = 'SELECT COUNT(*) as new  FROM data  WHERE  created_date >= "'.$date1.'" AND created_date<= "'.$date2.' 23:59:00" AND category = "CFF - WDI" AND Urgency ="High"';
$sql1Cc = 'SELECT COUNT(*) as new  FROM data  WHERE  created_date >= "'.$date1.'" AND created_date<= "'.$date2.' 23:59:00" AND category = "CFF - WDI" AND Urgency ="Critical"';
$sql2Cl = 'SELECT COUNT(*) as open FROM data  WHERE   (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated") AND category = "CFF - WDI" AND Urgency = "Low"';
$sql2Cm = 'SELECT COUNT(*) as open FROM data  WHERE   (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated") AND category = "CFF - WDI" AND Urgency = "Medium"';
$sql2Ch = 'SELECT COUNT(*) as open FROM data  WHERE   (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated") AND category = "CFF - WDI" AND Urgency = "High"';
$sql2Cc = 'SELECT COUNT(*) as open FROM data  WHERE   (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated") AND category = "CFF - WDI" AND Urgency = "Critical"';
$sql3Cl = 'SELECT COUNT(*) as resolved  FROM data  WHERE  resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND category = "CFF - WDI" AND Urgency = "Low"';
$sql3Cm = 'SELECT COUNT(*) as resolved  FROM data  WHERE  resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND category = "CFF - WDI" AND Urgency = "Medium"';
$sql3Ch = 'SELECT COUNT(*) as resolved  FROM data  WHERE  resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND category = "CFF - WDI" AND Urgency = "High"';
$sql3Cc = 'SELECT COUNT(*) as resolved  FROM data  WHERE  resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND category = "CFF - WDI" AND Urgency = "Critical"';
$sql4C = 'SELECT COUNT(*) as closed  FROM data  WHERE  status = "Closed" AND closure_date >= "'.$date1.'" AND closure_date<= "'.$date2.' 23:59:00" AND category = "CFF - WDI"';

$sql5lOKC = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    category = "CFF - WDI"   AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and (datediff( owned_date, created_date) <=2) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql5lKOC = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     category = "CFF - WDI"   AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql5mOKC = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    category = "CFF - WDI"   AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and (datediff( owned_date, created_date) <=2) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql5mKOC = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     category = "CFF - WDI"   AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" )  AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql5hOKC = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    category = "CFF - WDI"   AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and (datediff( owned_date, created_date) <=2) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql5hKOC = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     category = "CFF - WDI"   AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" )  AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6lOKC = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    category = "CFF - WDI"   AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0))  <=15) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6lKOC = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     category = "CFF - WDI"   AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6mOKC = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    category = "CFF - WDI"   AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0))  <=10) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6mKOC = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     category = "CFF - WDI"   AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" )  AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6hOKC = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    category = "CFF - WDI"   AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0))  <=5) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6hKOC = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     category = "CFF - WDI"   AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" )  AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql7C = 'SELECT COUNT(*) as billable  FROM data  WHERE  status = "Resolved" AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND facturable = "YES" AND category = "CFF - WDI"';
$sql8C = 'SELECT COUNT(*) as interne  FROM data  WHERE  status = "Resolved" AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND interne = "YES" AND category = "CFF - WDI"';


//TIckets ASPARTAM
$sql1Al = 'SELECT COUNT(*) as new  FROM data  WHERE  created_date >= "'.$date1.'" AND created_date<= "'.$date2.' 23:59:00" AND category = "ASPARTAM" AND Urgency ="Low"';
$sql1Am = 'SELECT COUNT(*) as new  FROM data  WHERE  created_date >= "'.$date1.'" AND created_date<= "'.$date2.' 23:59:00" AND category = "ASPARTAM" AND Urgency ="Medium"';
$sql1Ah = 'SELECT COUNT(*) as new  FROM data  WHERE  created_date >= "'.$date1.'" AND created_date<= "'.$date2.' 23:59:00" AND category = "ASPARTAM" AND Urgency ="High"';
$sql1Ac = 'SELECT COUNT(*) as new  FROM data  WHERE  created_date >= "'.$date1.'" AND created_date<= "'.$date2.' 23:59:00" AND category = "ASPARTAM" AND Urgency ="Critical"';
$sql2Al = 'SELECT COUNT(*) as open FROM data  WHERE   (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated") AND category = "ASPARTAM" AND Urgency = "Low"';
$sql2Am = 'SELECT COUNT(*) as open FROM data  WHERE   (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated") AND category = "ASPARTAM" AND Urgency = "Medium"';
$sql2Ah = 'SELECT COUNT(*) as open FROM data  WHERE   (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated") AND category = "ASPARTAM" AND Urgency = "High"';
$sql2Ac = 'SELECT COUNT(*) as open FROM data  WHERE   (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated") AND category = "ASPARTAM" AND Urgency = "Critical"';
$sql3Al = 'SELECT COUNT(*) as resolved  FROM data  WHERE  resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND category = "ASPARTAM" AND Urgency = "Low"';
$sql3Am = 'SELECT COUNT(*) as resolved  FROM data  WHERE  resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND category = "ASPARTAM" AND Urgency = "Medium"';
$sql3Ah = 'SELECT COUNT(*) as resolved  FROM data  WHERE  resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND category = "ASPARTAM" AND Urgency = "High"';
$sql3Ac = 'SELECT COUNT(*) as resolved  FROM data  WHERE  resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND category = "ASPARTAM" AND Urgency = "Critical"';
$sql4A = 'SELECT COUNT(*) as closed  FROM data  WHERE  status = "Closed" AND closure_date >= "'.$date1.'" AND closure_date<= "'.$date2.' 23:59:00" AND category = "ASPARTAM"';

$sql5lOKA = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    category = "ASPARTAM"   AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and (datediff( owned_date, created_date) <=2) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql5lKOA = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     category = "ASPARTAM"   AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql5mOKA = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    category = "ASPARTAM"   AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and (datediff( owned_date, created_date) <=2) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql5mKOA = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     category = "ASPARTAM"   AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" )  AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql5hOKA = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    category = "ASPARTAM"   AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and (datediff( owned_date, created_date) <=2) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql5hKOA = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     category = "ASPARTAM"   AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" )  AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6lOKA = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    category = "ASPARTAM"   AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0))  <=15) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6lKOA = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     category = "ASPARTAM"   AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6mOKA = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    category = "ASPARTAM"   AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0))  <=10) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6mKOA = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     category = "ASPARTAM"   AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" )  AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6hOKA = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    category = "ASPARTAM"   AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0))  <=5) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6hKOA = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     category = "ASPARTAM"   AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" )  AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql7A = 'SELECT COUNT(*) as billable  FROM data  WHERE  status = "Resolved" AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND facturable = "YES" AND category = "ASPARTAM"';
$sql8A = 'SELECT COUNT(*) as interne  FROM data  WHERE  status = "Resolved" AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND interne = "YES" AND category = "ASPARTAM"';

//TIckets ELIPSOS
$sql1El = 'SELECT COUNT(*) as new  FROM data  WHERE  created_date >= "'.$date1.'" AND created_date<= "'.$date2.' 23:59:00" AND (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" ) AND Urgency ="Low"';
$sql1Em = 'SELECT COUNT(*) as new  FROM data  WHERE  created_date >= "'.$date1.'" AND created_date<= "'.$date2.' 23:59:00" AND (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" ) AND Urgency ="Medium"';
$sql1Eh = 'SELECT COUNT(*) as new  FROM data  WHERE  created_date >= "'.$date1.'" AND created_date<= "'.$date2.' 23:59:00" AND (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" ) AND Urgency ="High"';
$sql1Ec = 'SELECT COUNT(*) as new  FROM data  WHERE  created_date >= "'.$date1.'" AND created_date<= "'.$date2.' 23:59:00" AND (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" ) AND Urgency ="Critical"';
$sql2El = 'SELECT COUNT(*) as open FROM data  WHERE   (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated") AND (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" ) AND Urgency = "Low"';
$sql2Em = 'SELECT COUNT(*) as open FROM data  WHERE   (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated") AND (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" ) AND Urgency = "Medium"';
$sql2Eh = 'SELECT COUNT(*) as open FROM data  WHERE   (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated") AND (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" ) AND Urgency = "High"';
$sql2Ec = 'SELECT COUNT(*) as open FROM data  WHERE   (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated") AND (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" ) AND Urgency = "Critical"';
$sql3El = 'SELECT COUNT(*) as resolved  FROM data  WHERE  resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" ) AND Urgency = "Low"';
$sql3Em = 'SELECT COUNT(*) as resolved  FROM data  WHERE  resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" ) AND Urgency = "Medium"';
$sql3Eh = 'SELECT COUNT(*) as resolved  FROM data  WHERE  resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" ) AND Urgency = "High"';
$sql3Ec = 'SELECT COUNT(*) as resolved  FROM data  WHERE  resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" ) AND Urgency = "Critical"';
$sql4E = 'SELECT COUNT(*) as closed  FROM data  WHERE  status = "Closed" AND closure_date >= "'.$date1.'" AND closure_date<= "'.$date2.' 23:59:00" AND (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" )';

$sql5lOKE = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" )   AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and (datediff( owned_date, created_date) <=2) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql5lKOE = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" )   AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql5mOKE = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" )   AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and (datediff( owned_date, created_date) <=2) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql5mKOE = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" )   AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" )  AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql5hOKE = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" )   AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and (datediff( owned_date, created_date) <=2) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql5hKOE = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" )   AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" )  AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6lOKE = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" )   AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0))  <=15) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6lKOE = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" )   AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6mOKE = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" )   AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0))  <=10) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6mKOE = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" )   AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" )  AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6hOKE = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" )   AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0))  <=5) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6hKOE = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" )   AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" )  AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql7E = 'SELECT COUNT(*) as billable  FROM data  WHERE  status = "Resolved" AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND facturable = "YES" AND (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" )';
$sql8E = 'SELECT COUNT(*) as interne  FROM data  WHERE  status = "Resolved" AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND interne = "YES" AND (category = "ELIPSOS - NSK" OR category = "ELIPSOS - YMS" )';

//TIckets RS
$sql1Rl = 'SELECT COUNT(*) as new  FROM data  WHERE  created_date >= "'.$date1.'" AND created_date<= "'.$date2.' 23:59:00" AND category = "RS - ClarityPPM" AND Urgency ="Low"';
$sql1Rm = 'SELECT COUNT(*) as new  FROM data  WHERE  created_date >= "'.$date1.'" AND created_date<= "'.$date2.' 23:59:00" AND category = "RS - ClarityPPM" AND Urgency ="Medium"';
$sql1Rh = 'SELECT COUNT(*) as new  FROM data  WHERE  created_date >= "'.$date1.'" AND created_date<= "'.$date2.' 23:59:00" AND category = "RS - ClarityPPM" AND Urgency ="High"';
$sql1Rc = 'SELECT COUNT(*) as new  FROM data  WHERE  created_date >= "'.$date1.'" AND created_date<= "'.$date2.' 23:59:00" AND category = "RS - ClarityPPM" AND Urgency ="Critical"';
$sql2Rl = 'SELECT COUNT(*) as open FROM data  WHERE   (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated") AND category = "RS - ClarityPPM" AND Urgency = "Low"';
$sql2Rm = 'SELECT COUNT(*) as open FROM data  WHERE   (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated") AND category = "RS - ClarityPPM" AND Urgency = "Medium"';
$sql2Rh = 'SELECT COUNT(*) as open FROM data  WHERE   (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated") AND category = "RS - ClarityPPM" AND Urgency = "High"';
$sql2Rc = 'SELECT COUNT(*) as open FROM data  WHERE   (status = "Owned" OR status = "New" OR status = "Bounced For Clarification" OR status = "Work In Progress" OR status = "Escalated") AND category = "RS - ClarityPPM" AND Urgency = "Critical"';
$sql3Rl = 'SELECT COUNT(*) as resolved  FROM data  WHERE  resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND category = "RS - ClarityPPM" AND Urgency = "Low"';
$sql3Rm = 'SELECT COUNT(*) as resolved  FROM data  WHERE  resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND category = "RS - ClarityPPM" AND Urgency = "Medium"';
$sql3Rh = 'SELECT COUNT(*) as resolved  FROM data  WHERE  resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND category = "RS - ClarityPPM" AND Urgency = "High"';
$sql3Rc = 'SELECT COUNT(*) as resolved  FROM data  WHERE  resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND category = "RS - ClarityPPM" AND Urgency = "Critical"';
$sql4R = 'SELECT COUNT(*) as closed  FROM data  WHERE  status = "Closed" AND closure_date >= "'.$date1.'" AND closure_date<= "'.$date2.' 23:59:00" AND category = "RS - ClarityPPM"';

$sql5lOKR = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    category = "RS - ClarityPPM"   AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and (datediff( owned_date, created_date) <=2) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql5lKOR = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     category = "RS - ClarityPPM"   AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql5mOKR = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    category = "RS - ClarityPPM"   AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and (datediff( owned_date, created_date) <=2) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql5mKOR = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     category = "RS - ClarityPPM"   AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" )  AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql5hOKR = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    category = "RS - ClarityPPM"   AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and (datediff( owned_date, created_date) <=2) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql5hKOR = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     category = "RS - ClarityPPM"   AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" )  AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6lOKR = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    category = "RS - ClarityPPM"   AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0))  <=15) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6lKOR = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     category = "RS - ClarityPPM"   AND urgency = "low" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6mOKR = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    category = "RS - ClarityPPM"   AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0))  <=10) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6mKOR = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     category = "RS - ClarityPPM"   AND urgency = "medium" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" )  AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6hOKR = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE    category = "RS - ClarityPPM"   AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" ) and ((datediff( resolution_date, created_date) - (WEEK(resolution_date) - WEEK(created_date))* 2 - IFNULL((datediff(end_bounced_time, start_bounced_time) - (WEEK(end_bounced_time) - WEEK(start_bounced_time))*2),0))  <=5) AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql6hKOR = 'SELECT COUNT(tracking_id) as numb FROM data  WHERE     category = "RS - ClarityPPM"   AND urgency = "high" AND (status = "Resolved" OR status = "Temporary Resolved" OR status = "Closed" )  AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00"';
$sql7R = 'SELECT COUNT(*) as billable  FROM data  WHERE  status = "Resolved" AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND facturable = "YES" AND category = "RS - ClarityPPM"';
$sql8R = 'SELECT COUNT(*) as interne  FROM data  WHERE  status = "Resolved" AND resolution_date >= "'.$date1.'" AND resolution_date<= "'.$date2.' 23:59:00" AND interne = "YES" AND category = "RS - ClarityPPM"';

// on envoie la requête env NTV
$req1l = mysql_query($sql1l) or die('Erreur SQL !<br>'.$sql1l.'<br>'.mysql_error()); 
$req1m = mysql_query($sql1m) or die('Erreur SQL !<br>'.$sql1m.'<br>'.mysql_error());
$req1h = mysql_query($sql1h) or die('Erreur SQL !<br>'.$sql1h.'<br>'.mysql_error());
$req1c = mysql_query($sql1c) or die('Erreur SQL !<br>'.$sql1c.'<br>'.mysql_error());
$req2l = mysql_query($sql2l) or die('Erreur SQL !<br>'.$sql2l.'<br>'.mysql_error()); 
$req2m = mysql_query($sql2m) or die('Erreur SQL !<br>'.$sql2m.'<br>'.mysql_error());
$req2h = mysql_query($sql2h) or die('Erreur SQL !<br>'.$sql2h.'<br>'.mysql_error());
$req2c = mysql_query($sql2c) or die('Erreur SQL !<br>'.$sql2c.'<br>'.mysql_error());
$req3l = mysql_query($sql3l) or die('Erreur SQL !<br>'.$sql3l.'<br>'.mysql_error()); 
$req3m = mysql_query($sql3m) or die('Erreur SQL !<br>'.$sql3m.'<br>'.mysql_error()); 
$req3h = mysql_query($sql3h) or die('Erreur SQL !<br>'.$sql3h.'<br>'.mysql_error()); 
$req3c = mysql_query($sql3c) or die('Erreur SQL !<br>'.$sql3c.'<br>'.mysql_error()); 
$req4 = mysql_query($sql4) or die('Erreur SQL !<br>'.$sql4.'<br>'.mysql_error()); 
$req5lOK = mysql_query($sql5lOK) or die('Erreur SQL !<br>'.$sql5lOK.'<br>'.mysql_error());
$req5lKO = mysql_query($sql5lKO) or die('Erreur SQL !<br>'.$sql5lKO.'<br>'.mysql_error());
$req5mOK = mysql_query($sql5mOK) or die('Erreur SQL !<br>'.$sql5mOK.'<br>'.mysql_error());
$req5mKO = mysql_query($sql5mKO) or die('Erreur SQL !<br>'.$sql5mKO.'<br>'.mysql_error());
$req5hOK = mysql_query($sql5hOK) or die('Erreur SQL !<br>'.$sql5hOK.'<br>'.mysql_error());
$req5hKO = mysql_query($sql5hKO) or die('Erreur SQL !<br>'.$sql5hKO.'<br>'.mysql_error());
$req6lOK = mysql_query($sql6lOK) or die('Erreur SQL !<br>'.$sql6lOK.'<br>'.mysql_error());
$req6lKO = mysql_query($sql6lKO) or die('Erreur SQL !<br>'.$sql6lKO.'<br>'.mysql_error());
$req6mOK = mysql_query($sql6mOK) or die('Erreur SQL !<br>'.$sql6mOK.'<br>'.mysql_error());
$req6mKO = mysql_query($sql6mKO) or die('Erreur SQL !<br>'.$sql6mKO.'<br>'.mysql_error());
$req6hOK = mysql_query($sql6hOK) or die('Erreur SQL !<br>'.$sql6hOK.'<br>'.mysql_error());
$req6hKO = mysql_query($sql6hKO) or die('Erreur SQL !<br>'.$sql6hKO.'<br>'.mysql_error());
$req7 = mysql_query($sql7) or die('Erreur SQL !<br>'.$sql7.'<br>'.mysql_error());
$req8 = mysql_query($sql8) or die('Erreur SQL !<br>'.$sql8.'<br>'.mysql_error());

$req1Cl = mysql_query($sql1Cl) or die('Erreur SQL !<br>'.$sql1Cl.'<br>'.mysql_error()); 
$req1Cm = mysql_query($sql1Cm) or die('Erreur SQL !<br>'.$sql1Cm.'<br>'.mysql_error());
$req1Ch = mysql_query($sql1Ch) or die('Erreur SQL !<br>'.$sql1Ch.'<br>'.mysql_error());
$req1Cc = mysql_query($sql1Cc) or die('Erreur SQL !<br>'.$sql1Cc.'<br>'.mysql_error());
$req2Cl = mysql_query($sql2Cl) or die('Erreur SQL !<br>'.$sql2Cl.'<br>'.mysql_error()); 
$req2Cm = mysql_query($sql2Cm) or die('Erreur SQL !<br>'.$sql2Cm.'<br>'.mysql_error());
$req2Ch = mysql_query($sql2Ch) or die('Erreur SQL !<br>'.$sql2Ch.'<br>'.mysql_error());
$req2Cc = mysql_query($sql2Cc) or die('Erreur SQL !<br>'.$sql2Cc.'<br>'.mysql_error());
$req3Cl = mysql_query($sql3Cl) or die('Erreur SQL !<br>'.$sql3Cl.'<br>'.mysql_error()); 
$req3Cm = mysql_query($sql3Cm) or die('Erreur SQL !<br>'.$sql3Cm.'<br>'.mysql_error()); 
$req3Ch = mysql_query($sql3Ch) or die('Erreur SQL !<br>'.$sql3Ch.'<br>'.mysql_error()); 
$req3Cc = mysql_query($sql3Cc) or die('Erreur SQL !<br>'.$sql3Cc.'<br>'.mysql_error()); 
$req4C = mysql_query($sql4C) or die('Erreur SQL !<br>'.$sql4C.'<br>'.mysql_error()); 
$req5lOKC = mysql_query($sql5lOKC) or die('Erreur SQL !<br>'.$sql5lOKC.'<br>'.mysql_error());
$req5lKOC = mysql_query($sql5lKOC) or die('Erreur SQL !<br>'.$sql5lKOC.'<br>'.mysql_error());
$req5mOKC = mysql_query($sql5mOKC) or die('Erreur SQL !<br>'.$sql5mOKC.'<br>'.mysql_error());
$req5mKOC = mysql_query($sql5mKOC) or die('Erreur SQL !<br>'.$sql5mKOC.'<br>'.mysql_error());
$req5hOKC = mysql_query($sql5hOKC) or die('Erreur SQL !<br>'.$sql5hOKC.'<br>'.mysql_error());
$req5hKOC = mysql_query($sql5hKOC) or die('Erreur SQL !<br>'.$sql5hKOC.'<br>'.mysql_error());
$req6lOKC = mysql_query($sql6lOKC) or die('Erreur SQL !<br>'.$sql6lOKC.'<br>'.mysql_error());
$req6lKOC = mysql_query($sql6lKOC) or die('Erreur SQL !<br>'.$sql6lKOC.'<br>'.mysql_error());
$req6mOKC = mysql_query($sql6mOKC) or die('Erreur SQL !<br>'.$sql6mOKC.'<br>'.mysql_error());
$req6mKOC = mysql_query($sql6mKOC) or die('Erreur SQL !<br>'.$sql6mKOC.'<br>'.mysql_error());
$req6hOKC = mysql_query($sql6hOKC) or die('Erreur SQL !<br>'.$sql6hOKC.'<br>'.mysql_error());
$req6hKOC = mysql_query($sql6hKOC) or die('Erreur SQL !<br>'.$sql6hKOC.'<br>'.mysql_error());
$req7C = mysql_query($sql7C) or die('Erreur SQL !<br>'.$sql7C.'<br>'.mysql_error());
$req8C = mysql_query($sql8C) or die('Erreur SQL !<br>'.$sql8C.'<br>'.mysql_error());

$req1Al = mysql_query($sql1Al) or die('Erreur SQL !<br>'.$sql1Al.'<br>'.mysql_error()); 
$req1Am = mysql_query($sql1Am) or die('Erreur SQL !<br>'.$sql1Am.'<br>'.mysql_error());
$req1Ah = mysql_query($sql1Ah) or die('Erreur SQL !<br>'.$sql1Ah.'<br>'.mysql_error());
$req1Ac = mysql_query($sql1Ac) or die('Erreur SQL !<br>'.$sql1Ac.'<br>'.mysql_error());
$req2Al = mysql_query($sql2Al) or die('Erreur SQL !<br>'.$sql2Al.'<br>'.mysql_error()); 
$req2Am = mysql_query($sql2Am) or die('Erreur SQL !<br>'.$sql2Am.'<br>'.mysql_error());
$req2Ah = mysql_query($sql2Ah) or die('Erreur SQL !<br>'.$sql2Ah.'<br>'.mysql_error());
$req2Ac = mysql_query($sql2Ac) or die('Erreur SQL !<br>'.$sql2Ac.'<br>'.mysql_error());
$req3Al = mysql_query($sql3Al) or die('Erreur SQL !<br>'.$sql3Al.'<br>'.mysql_error()); 
$req3Am = mysql_query($sql3Am) or die('Erreur SQL !<br>'.$sql3Am.'<br>'.mysql_error()); 
$req3Ah = mysql_query($sql3Ah) or die('Erreur SQL !<br>'.$sql3Ah.'<br>'.mysql_error()); 
$req3Ac = mysql_query($sql3Ac) or die('Erreur SQL !<br>'.$sql3Ac.'<br>'.mysql_error()); 
$req4A = mysql_query($sql4A) or die('Erreur SQL !<br>'.$sql4A.'<br>'.mysql_error()); 
$req5lOKA = mysql_query($sql5lOKA) or die('Erreur SQL !<br>'.$sql5lOKA.'<br>'.mysql_error());
$req5lKOA = mysql_query($sql5lKOA) or die('Erreur SQL !<br>'.$sql5lKOA.'<br>'.mysql_error());
$req5mOKA = mysql_query($sql5mOKA) or die('Erreur SQL !<br>'.$sql5mOKA.'<br>'.mysql_error());
$req5mKOA = mysql_query($sql5mKOA) or die('Erreur SQL !<br>'.$sql5mKOA.'<br>'.mysql_error());
$req5hOKA = mysql_query($sql5hOKA) or die('Erreur SQL !<br>'.$sql5hOKA.'<br>'.mysql_error());
$req5hKOA = mysql_query($sql5hKOA) or die('Erreur SQL !<br>'.$sql5hKOA.'<br>'.mysql_error());
$req6lOKA = mysql_query($sql6lOKA) or die('Erreur SQL !<br>'.$sql6lOKA.'<br>'.mysql_error());
$req6lKOA = mysql_query($sql6lKOA) or die('Erreur SQL !<br>'.$sql6lKOA.'<br>'.mysql_error());
$req6mOKA = mysql_query($sql6mOKA) or die('Erreur SQL !<br>'.$sql6mOKA.'<br>'.mysql_error());
$req6mKOA = mysql_query($sql6mKOA) or die('Erreur SQL !<br>'.$sql6mKOA.'<br>'.mysql_error());
$req6hOKA = mysql_query($sql6hOKA) or die('Erreur SQL !<br>'.$sql6hOKA.'<br>'.mysql_error());
$req6hKOA = mysql_query($sql6hKOA) or die('Erreur SQL !<br>'.$sql6hKOA.'<br>'.mysql_error());
$req7A = mysql_query($sql7A) or die('Erreur SQL !<br>'.$sql7A.'<br>'.mysql_error());
$req8A = mysql_query($sql8A) or die('Erreur SQL !<br>'.$sql8A.'<br>'.mysql_error());

$req1El = mysql_query($sql1El) or die('Erreur SQL !<br>'.$sql1El.'<br>'.mysql_error()); 
$req1Em = mysql_query($sql1Em) or die('Erreur SQL !<br>'.$sql1Em.'<br>'.mysql_error());
$req1Eh = mysql_query($sql1Eh) or die('Erreur SQL !<br>'.$sql1Eh.'<br>'.mysql_error());
$req1Ec = mysql_query($sql1Ec) or die('Erreur SQL !<br>'.$sql1Ec.'<br>'.mysql_error());
$req2El = mysql_query($sql2El) or die('Erreur SQL !<br>'.$sql2El.'<br>'.mysql_error()); 
$req2Em = mysql_query($sql2Em) or die('Erreur SQL !<br>'.$sql2Em.'<br>'.mysql_error());
$req2Eh = mysql_query($sql2Eh) or die('Erreur SQL !<br>'.$sql2Eh.'<br>'.mysql_error());
$req2Ec = mysql_query($sql2Ec) or die('Erreur SQL !<br>'.$sql2Ec.'<br>'.mysql_error());
$req3El = mysql_query($sql3El) or die('Erreur SQL !<br>'.$sql3El.'<br>'.mysql_error()); 
$req3Em = mysql_query($sql3Em) or die('Erreur SQL !<br>'.$sql3Em.'<br>'.mysql_error()); 
$req3Eh = mysql_query($sql3Eh) or die('Erreur SQL !<br>'.$sql3Eh.'<br>'.mysql_error()); 
$req3Ec = mysql_query($sql3Ec) or die('Erreur SQL !<br>'.$sql3Ec.'<br>'.mysql_error());  
$req4E = mysql_query($sql4E) or die('Erreur SQL !<br>'.$sql4E.'<br>'.mysql_error()); 
$req5lOKE = mysql_query($sql5lOKE) or die('Erreur SQL !<br>'.$sql5lOKE.'<br>'.mysql_error());
$req5lKOE = mysql_query($sql5lKOE) or die('Erreur SQL !<br>'.$sql5lKOE.'<br>'.mysql_error());
$req5mOKE = mysql_query($sql5mOKE) or die('Erreur SQL !<br>'.$sql5mOKE.'<br>'.mysql_error());
$req5mKOE = mysql_query($sql5mKOE) or die('Erreur SQL !<br>'.$sql5mKOE.'<br>'.mysql_error());
$req5hOKE = mysql_query($sql5hOKE) or die('Erreur SQL !<br>'.$sql5hOKE.'<br>'.mysql_error());
$req5hKOE = mysql_query($sql5hKOE) or die('Erreur SQL !<br>'.$sql5hKOE.'<br>'.mysql_error());
$req6lOKE = mysql_query($sql6lOKE) or die('Erreur SQL !<br>'.$sql6lOKE.'<br>'.mysql_error());
$req6lKOE = mysql_query($sql6lKOE) or die('Erreur SQL !<br>'.$sql6lKOE.'<br>'.mysql_error());
$req6mOKE = mysql_query($sql6mOKE) or die('Erreur SQL !<br>'.$sql6mOKE.'<br>'.mysql_error());
$req6mKOE = mysql_query($sql6mKOE) or die('Erreur SQL !<br>'.$sql6mKOE.'<br>'.mysql_error());
$req6hOKE = mysql_query($sql6hOKE) or die('Erreur SQL !<br>'.$sql6hOKE.'<br>'.mysql_error());
$req6hKOE = mysql_query($sql6hKOE) or die('Erreur SQL !<br>'.$sql6hKOE.'<br>'.mysql_error());
$req7E = mysql_query($sql7E) or die('Erreur SQL !<br>'.$sql7E.'<br>'.mysql_error());
$req8E = mysql_query($sql8E) or die('Erreur SQL !<br>'.$sql8E.'<br>'.mysql_error());

$req1Rl = mysql_query($sql1Rl) or die('Erreur SQL !<br>'.$sql1Rl.'<br>'.mysql_error()); 
$req1Rm = mysql_query($sql1Rm) or die('Erreur SQL !<br>'.$sql1Rm.'<br>'.mysql_error());
$req1Rh = mysql_query($sql1Rh) or die('Erreur SQL !<br>'.$sql1Rh.'<br>'.mysql_error());
$req1Rc = mysql_query($sql1Rc) or die('Erreur SQL !<br>'.$sql1Rc.'<br>'.mysql_error());
$req2Rl = mysql_query($sql2Rl) or die('Erreur SQL !<br>'.$sql2Rl.'<br>'.mysql_error()); 
$req2Rm = mysql_query($sql2Rm) or die('Erreur SQL !<br>'.$sql2Rm.'<br>'.mysql_error());
$req2Rh = mysql_query($sql2Rh) or die('Erreur SQL !<br>'.$sql2Rh.'<br>'.mysql_error());
$req2Rc = mysql_query($sql2Rc) or die('Erreur SQL !<br>'.$sql2Rc.'<br>'.mysql_error());
$req3Rl = mysql_query($sql3Rl) or die('Erreur SQL !<br>'.$sql3Rl.'<br>'.mysql_error()); 
$req3Rm = mysql_query($sql3Rm) or die('Erreur SQL !<br>'.$sql3Rm.'<br>'.mysql_error()); 
$req3Rh = mysql_query($sql3Rh) or die('Erreur SQL !<br>'.$sql3Rh.'<br>'.mysql_error()); 
$req3Rc = mysql_query($sql3Rc) or die('Erreur SQL !<br>'.$sql3Rc.'<br>'.mysql_error());
$req4R = mysql_query($sql4R) or die('Erreur SQL !<br>'.$sql4R.'<br>'.mysql_error()); 
$req5lOKR = mysql_query($sql5lOKR) or die('Erreur SQL !<br>'.$sql5lOKR.'<br>'.mysql_error());
$req5lKOR = mysql_query($sql5lKOR) or die('Erreur SQL !<br>'.$sql5lKOR.'<br>'.mysql_error());
$req5mOKR = mysql_query($sql5mOKR) or die('Erreur SQL !<br>'.$sql5mOKR.'<br>'.mysql_error());
$req5mKOR = mysql_query($sql5mKOR) or die('Erreur SQL !<br>'.$sql5mKOR.'<br>'.mysql_error());
$req5hOKR = mysql_query($sql5hOKR) or die('Erreur SQL !<br>'.$sql5hOKR.'<br>'.mysql_error());
$req5hKOR = mysql_query($sql5hKOR) or die('Erreur SQL !<br>'.$sql5hKOR.'<br>'.mysql_error());
$req6lOKR = mysql_query($sql6lOKR) or die('Erreur SQL !<br>'.$sql6lOKR.'<br>'.mysql_error());
$req6lKOR = mysql_query($sql6lKOR) or die('Erreur SQL !<br>'.$sql6lKOR.'<br>'.mysql_error());
$req6mOKR = mysql_query($sql6mOKR) or die('Erreur SQL !<br>'.$sql6mOKR.'<br>'.mysql_error());
$req6mKOR = mysql_query($sql6mKOR) or die('Erreur SQL !<br>'.$sql6mKOR.'<br>'.mysql_error());
$req6hOKR = mysql_query($sql6hOKR) or die('Erreur SQL !<br>'.$sql6hOKR.'<br>'.mysql_error());
$req6hKOR = mysql_query($sql6hKOR) or die('Erreur SQL !<br>'.$sql6hKOR.'<br>'.mysql_error());
$req7R = mysql_query($sql7R) or die('Erreur SQL !<br>'.$sql7R.'<br>'.mysql_error());
$req8R = mysql_query($sql8R) or die('Erreur SQL !<br>'.$sql8R.'<br>'.mysql_error());

//NTV
while ( ($data1l = mysql_fetch_assoc($req1l))!== false) {
$new1l = $data1l["new"];
}
while ( ($data1m = mysql_fetch_assoc($req1m))!== false) {
$new1m = $data1m["new"];
}
while ( ($data1h = mysql_fetch_assoc($req1h))!== false) {
$new1h = $data1h["new"];
}
while ( ($data1c = mysql_fetch_assoc($req1c))!== false) {
$new1c = $data1c["new"];
}
while ( ($data2l = mysql_fetch_assoc($req2l))!== false) {
$open1l = $data2l["open"];
}
while ( ($data2m = mysql_fetch_assoc($req2m))!== false) {
$open1m = $data2m["open"];
}
while ( ($data2h = mysql_fetch_assoc($req2h))!== false) {
$open1h = $data2h["open"];
}
while ( ($data2c = mysql_fetch_assoc($req2c))!== false) {
$open1c = $data2c["open"];
}
while ( ($data3l = mysql_fetch_assoc($req3l))!== false) {
$resolved1l = $data3l["resolved"];
}
while ( ($data3m = mysql_fetch_assoc($req3m))!== false) {
$resolved1m = $data3m["resolved"];
}
while ( ($data3h = mysql_fetch_assoc($req3h))!== false) {
$resolved1h = $data3h["resolved"];
}
while ( ($data3c = mysql_fetch_assoc($req3c))!== false) {
$resolved1c = $data3c["resolved"];
}
while ( ($data4 = mysql_fetch_assoc($req4))!== false) {
$closed1 = $data4["closed"];
}
while ( ($data5lOK = mysql_fetch_assoc($req5lOK))!== false) {
$TTILOK = $data5lOK["numb"];
}
while ( ($data5lKO = mysql_fetch_assoc($req5lKO))!== false) {
$TTILKO = $data5lKO["numb"];
}
while ( ($data5mOK = mysql_fetch_assoc($req5mOK))!== false) {
$TTIMOK = $data5mOK["numb"];
}
while ( ($data5mKO = mysql_fetch_assoc($req5mKO))!== false) {
$TTIMKO = $data5mKO["numb"];
}
while ( ($data5hOK = mysql_fetch_assoc($req5hOK))!== false) {
$TTIHOK = $data5hOK["numb"];
}
while ( ($data5hKO = mysql_fetch_assoc($req5hKO))!== false) {
$TTIHKO = $data5hKO["numb"];
if (( $TTILKO + $TTIMKO + $TTIHKO)== 0){ $TTI1 = 0;}
else { 
$TTI1 = ($TTIHOK) /($TTIHKO) *100;
$TTI1= round( $TTI1, 2);
}
}
while ( ($data6lOK = mysql_fetch_assoc($req6lOK))!== false) {
$TTRLOK = $data6lOK["numb"];
}
while ( ($data6lKO = mysql_fetch_assoc($req6lKO))!== false) {
$TTRLKO = $data6lKO["numb"];
}
while ( ($data6mOK = mysql_fetch_assoc($req6mOK))!== false) {
$TTRMOK = $data6mOK["numb"];
}
while ( ($data6mKO = mysql_fetch_assoc($req6mKO))!== false) {
$TTRMKO = $data6mKO["numb"];
}
while ( ($data6hOK = mysql_fetch_assoc($req6hOK))!== false) {
$TTRHOK = $data6hOK["numb"];
}
while ( ($data6hKO = mysql_fetch_assoc($req6hKO))!== false) {
$TTRHKO = $data6hKO["numb"];
if (( $TTRLKO + $TTRMKO + $TTRHKO)== 0){ $TTR1 = 0;}
else { 
$TTR1 = ($TTRHOK) /($TTRHKO) *100;
$TTR1= round( $TTR1, 2);
}
}
while ( ($data7 = mysql_fetch_assoc($req7))!== false) {
$billable1 = $data7["billable"];
}
while ( ($data8 = mysql_fetch_assoc($req8))!== false) {
$interne1 = $data8["interne"];
}

//CFF
while ( ($data1Cl = mysql_fetch_assoc($req1Cl))!== false) {
$new2l = $data1Cl["new"];
}
while ( ($data1Cm = mysql_fetch_assoc($req1Cm))!== false) {
$new2m = $data1Cm["new"];
}
while ( ($data1Ch = mysql_fetch_assoc($req1Ch))!== false) {
$new2h = $data1Ch["new"];
}
while ( ($data1Cc = mysql_fetch_assoc($req1Cc))!== false) {
$new2c = $data1Cc["new"];
}
while ( ($data2Cl = mysql_fetch_assoc($req2Cl))!== false) {
$open2l = $data2Cl["open"];
}
while ( ($data2Cm = mysql_fetch_assoc($req2Cm))!== false) {
$open2m = $data2Cm["open"];
}
while ( ($data2Ch = mysql_fetch_assoc($req2Ch))!== false) {
$open2h = $data2Ch["open"];
}
while ( ($data2Cc = mysql_fetch_assoc($req2Cc))!== false) {
$open2c = $data2Cc["open"];
}
while ( ($data3Cl = mysql_fetch_assoc($req3Cl))!== false) {
$resolved2l = $data3Cl["resolved"];
}
while ( ($data3Cm = mysql_fetch_assoc($req3Cm))!== false) {
$resolved2m = $data3Cm["resolved"];
}
while ( ($data3Ch = mysql_fetch_assoc($req3Ch))!== false) {
$resolved2h = $data3Ch["resolved"];
}
while ( ($data3Cc = mysql_fetch_assoc($req3Cc))!== false) {
$resolved2c = $data3Cc["resolved"];
}
while ( ($data4C = mysql_fetch_assoc($req4C))!== false) {
$closed2 = $data4C["closed"];
}
while ( ($data5lOKC = mysql_fetch_assoc($req5lOKC))!== false) {
$TTILOKC = $data5lOKC["numb"];
}
while ( ($data5lKOC = mysql_fetch_assoc($req5lKOC))!== false) {
$TTILKOC = $data5lKOC["numb"];

}
while ( ($data5mOKC = mysql_fetch_assoc($req5mOKC))!== false) {
$TTIMOKC = $data5mOKC["numb"];
}
while ( ($data5mKOC = mysql_fetch_assoc($req5mKOC))!== false) {
$TTIMKOC = $data5mKOC["numb"];

}
while ( ($data5hOKC = mysql_fetch_assoc($req5hOKC))!== false) {
$TTIHOKC = $data5hOKC["numb"];
}
while ( ($data5hKOC = mysql_fetch_assoc($req5hKOC))!== false) {
$TTIHKOC = $data5hKOC["numb"];
if (( $TTILKOC + $TTIMKOC + $TTIHKOC)== 0){ $TTI2 = 0;}
else { 
$TTI2 = ($TTIHOKC) /($TTIHKOC) *100;
$TTI2= round( $TTI2, 2);
}
}
while ( ($data6lOKC = mysql_fetch_assoc($req6lOKC))!== false) {
$TTRLOKC = $data6lOKC["numb"];
}
while ( ($data6lKOC = mysql_fetch_assoc($req6lKOC))!== false) {
$TTRLKOC = $data6lKOC["numb"];

}
while ( ($data6mOKC = mysql_fetch_assoc($req6mOKC))!== false) {
$TTRMOKC = $data6mOKC["numb"];
}
while ( ($data6mKOC = mysql_fetch_assoc($req6mKOC))!== false) {
$TTRMKOC = $data6mKOC["numb"];

}
while ( ($data6hOKC = mysql_fetch_assoc($req6hOKC))!== false) {
$TTRHOKC = $data6hOKC["numb"];
}
while ( ($data6hKOC = mysql_fetch_assoc($req6hKOC))!== false) {
$TTRHKOC = $data6hKOC["numb"];
if (( $TTRLKOC + $TTRMKOC + $TTRHKOC)== 0){ $TTR2 = 0;}
else { 
$TTR2 = ($TTRHOKC) /($TTRHKOC) *100;
$TTR2= round( $TTR2, 2);
}
}
while ( ($data7C = mysql_fetch_assoc($req7C))!== false) {
$billable2 = $data7C["billable"];
}
while ( ($data8C = mysql_fetch_assoc($req8C))!== false) {
$interne2 = $data8C["interne"];
}
//ASPARTAM

while ( ($data1Al = mysql_fetch_assoc($req1Al))!== false) {
$new3l = $data1Al["new"];
}
while ( ($data1Am = mysql_fetch_assoc($req1Am))!== false) {
$new3m = $data1Am["new"];
}
while ( ($data1Ah = mysql_fetch_assoc($req1Ah))!== false) {
$new3h = $data1Ah["new"];
}
while ( ($data1Ac = mysql_fetch_assoc($req1Ac))!== false) {
$new3c = $data1Ac["new"];
}
while ( ($data2Al = mysql_fetch_assoc($req2Al))!== false) {
$open3l = $data2Al["open"];
}
while ( ($data2Am = mysql_fetch_assoc($req2Am))!== false) {
$open3m = $data2Am["open"];
}
while ( ($data2Ah = mysql_fetch_assoc($req2Ah))!== false) {
$open3h = $data2Ah["open"];
}
while ( ($data2Ac = mysql_fetch_assoc($req2Ac))!== false) {
$open3c = $data2Ac["open"];
}
while ( ($data3Al = mysql_fetch_assoc($req3Al))!== false) {
$resolved3l = $data3Al["resolved"];
}
while ( ($data3Am = mysql_fetch_assoc($req3Am))!== false) {
$resolved3m = $data3Am["resolved"];
}
while ( ($data3Ah = mysql_fetch_assoc($req3Ah))!== false) {
$resolved3h = $data3Ah["resolved"];
}
while ( ($data3Ac = mysql_fetch_assoc($req3Ac))!== false) {
$resolved3c = $data3Ac["resolved"];
}
while ( ($data4A = mysql_fetch_assoc($req4A))!== false) {
$closed3 = $data4A["closed"];
}
while ( ($data5lOKA = mysql_fetch_assoc($req5lOKA))!== false) {
$TTILOKA = $data5lOKA["numb"];
}
while ( ($data5lKOA = mysql_fetch_assoc($req5lKOA))!== false) {
$TTILKOA = $data5lKOA["numb"];

}
while ( ($data5mOKA = mysql_fetch_assoc($req5mOKA))!== false) {
$TTIMOKA = $data5mOKA["numb"];
}
while ( ($data5mKOA = mysql_fetch_assoc($req5mKOA))!== false) {
$TTIMKOA = $data5mKOA["numb"];

}
while ( ($data5hOKA = mysql_fetch_assoc($req5hOKA))!== false) {
$TTIHOKA = $data5hOKA["numb"];
}
while ( ($data5hKOA = mysql_fetch_assoc($req5hKOA))!== false) {
$TTIHKOA = $data5hKOA["numb"];

if (( $TTILKOA + $TTIMKOA + $TTIHKOA)== 0){ $TTI3 = 0;}
else { 

$TTI3 = ($TTIHOKA) /($TTIHKOA) *100;
$TTI3= round( $TTI3, 2);
}
}
while ( ($data6lOKA = mysql_fetch_assoc($req6lOKA))!== false) {
$TTRLOKA = $data6lOKA["numb"];
}
while ( ($data6lKOA = mysql_fetch_assoc($req6lKOA))!== false) {
$TTRLKOA = $data6lKOA["numb"];

}
while ( ($data6mOKA = mysql_fetch_assoc($req6mOKA))!== false) {
$TTRMOKA = $data6mOKA["numb"];
}
while ( ($data6mKOA = mysql_fetch_assoc($req6mKOA))!== false) {
$TTRMKOA = $data6mKOA["numb"];

}
while ( ($data6hOKA = mysql_fetch_assoc($req6hOKA))!== false) {
$TTRHOKA = $data6hOKA["numb"];
}
while ( ($data6hKOA = mysql_fetch_assoc($req6hKOA))!== false) {
$TTRHKOA = $data6hKOA["numb"];
if (( $TTRLKOA + $TTRMKOA + $TTRHKOA)== 0){ $TTR3 = 0;}
else { 
$TTR3 = ($TTRHOKA) /($TTRHKOA) *100;
$TTR3= round( $TTR3, 2);
}
}
while ( ($data7A = mysql_fetch_assoc($req7A))!== false) {
$billable3 = $data7A["billable"];
}
while ( ($data8A = mysql_fetch_assoc($req8A))!== false) {
$interne3 = $data8A["interne"];
}

//ELIPSOS

while ( ($data1El = mysql_fetch_assoc($req1El))!== false) {
$new4l = $data1El["new"];
}
while ( ($data1Em = mysql_fetch_assoc($req1Em))!== false) {
$new4m = $data1Em["new"];
}
while ( ($data1Eh = mysql_fetch_assoc($req1Eh))!== false) {
$new4h = $data1Eh["new"];
}
while ( ($data1Ec = mysql_fetch_assoc($req1Ec))!== false) {
$new4c = $data1Ec["new"];
}
while ( ($data2El = mysql_fetch_assoc($req2El))!== false) {
$open4l = $data2El["open"];
}
while ( ($data2Em = mysql_fetch_assoc($req2Em))!== false) {
$open4m = $data2Em["open"];
}
while ( ($data2Eh = mysql_fetch_assoc($req2Eh))!== false) {
$open4h = $data2Eh["open"];
}
while ( ($data2Ec = mysql_fetch_assoc($req2Ec))!== false) {
$open4c = $data2Ec["open"];
}
while ( ($data3El = mysql_fetch_assoc($req3El))!== false) {
$resolved4l = $data3El["resolved"];
}
while ( ($data3Em = mysql_fetch_assoc($req3Em))!== false) {
$resolved4m = $data3Em["resolved"];
}
while ( ($data3Eh = mysql_fetch_assoc($req3Eh))!== false) {
$resolved4h = $data3Eh["resolved"];
}
while ( ($data3Ec = mysql_fetch_assoc($req3Ec))!== false) {
$resolved4c = $data3Ec["resolved"];
}
while ( ($data4E = mysql_fetch_assoc($req4E))!== false) {
$closed4 = $data4E["closed"];
}
while ( ($data5lOKE = mysql_fetch_assoc($req5lOKE))!== false) {
$TTILOKE = $data5lOKE["numb"];
}
while ( ($data5lKOE = mysql_fetch_assoc($req5lKOE))!== false) {
$TTILKOE = $data5lKOE["numb"];

}
while ( ($data5mOKE = mysql_fetch_assoc($req5mOKE))!== false) {
$TTIMOKE = $data5mOKE["numb"];
}
while ( ($data5mKOE = mysql_fetch_assoc($req5mKOE))!== false) {
$TTIMKOE = $data5mKOE["numb"];

}
while ( ($data5hOKE = mysql_fetch_assoc($req5hOKE))!== false) {
$TTIHOKE = $data5hOKE["numb"];
}
while ( ($data5hKOE = mysql_fetch_assoc($req5hKOE))!== false) {
$TTIHKOE = $data5hKOE["numb"];

if (( $TTILKOE + $TTIMKOE + $TTIHKOE)== 0){ $TTI4 = 0;}
else { 

$TTI4 = ($TTIHOKE) /($TTIHKOE) *100;
$TTI4= round( $TTI4, 2);
}
}
while ( ($data6lOKE = mysql_fetch_assoc($req6lOKE))!== false) {
$TTRLOKE = $data6lOKE["numb"];
}
while ( ($data6lKOE = mysql_fetch_assoc($req6lKOE))!== false) {
$TTRLKOE = $data6lKOE["numb"];

}
while ( ($data6mOKE = mysql_fetch_assoc($req6mOKE))!== false) {
$TTRMOKE = $data6mOKE["numb"];
}
while ( ($data6mKOE = mysql_fetch_assoc($req6mKOE))!== false) {
$TTRMKOE = $data6mKOE["numb"];

}
while ( ($data6hOKE = mysql_fetch_assoc($req6hOKE))!== false) {
$TTRHOKE = $data6hOKE["numb"];
}
while ( ($data6hKOE = mysql_fetch_assoc($req6hKOE))!== false) {
$TTRHKOE = $data6hKOE["numb"];
if (( $TTRLKOE + $TTRMKOE + $TTRHKOE)== 0){ $TTR4 = 0;}
else { 
$TTR4 = ($TTRHOKE) /($TTRHKOE) *100;
$TTR4= round( $TTR4, 2);
}
}
while ( ($data7E = mysql_fetch_assoc($req7E))!== false) {
$billable4 = $data7E["billable"];
}
while ( ($data8E = mysql_fetch_assoc($req8E))!== false) {
$interne4 = $data8E["interne"];
}

//RS

while ( ($data1Rl = mysql_fetch_assoc($req1Rl))!== false) {
$new5l = $data1Rl["new"];
}
while ( ($data1Rm = mysql_fetch_assoc($req1Rm))!== false) {
$new5m = $data1Rm["new"];
}
while ( ($data1Rh = mysql_fetch_assoc($req1Rh))!== false) {
$new5h = $data1Rh["new"];
}
while ( ($data1Rc = mysql_fetch_assoc($req1Rc))!== false) {
$new5c = $data1Rc["new"];
}
while ( ($data2Rl = mysql_fetch_assoc($req2Rl))!== false) {
$open5l = $data2Rl["open"];
}
while ( ($data2Rm = mysql_fetch_assoc($req2Rm))!== false) {
$open5m = $data2Rm["open"];
}
while ( ($data2Rh = mysql_fetch_assoc($req2Rh))!== false) {
$open5h = $data2Rh["open"];
}
while ( ($data2Rc = mysql_fetch_assoc($req2Rc))!== false) {
$open5c = $data2Rc["open"];
}
while ( ($data3Rl = mysql_fetch_assoc($req3Rl))!== false) {
$resolved5l = $data3Rl["resolved"];
}
while ( ($data3Rm = mysql_fetch_assoc($req3Rm))!== false) {
$resolved5m = $data3Rm["resolved"];
}
while ( ($data3Rh = mysql_fetch_assoc($req3Rh))!== false) {
$resolved5h = $data3Rh["resolved"];
}
while ( ($data3Rc = mysql_fetch_assoc($req3Rc))!== false) {
$resolved5c = $data3Rc["resolved"];
}
while ( ($data4R = mysql_fetch_assoc($req4R))!== false) {
$closed5 = $data4R["closed"];
}
while ( ($data5lOKR = mysql_fetch_assoc($req5lOKR))!== false) {
$TTILOKR = $data5lOKR["numb"];
}
while ( ($data5lKOR = mysql_fetch_assoc($req5lKOR))!== false) {
$TTILKOR = $data5lKOR["numb"];

}
while ( ($data5mOKR = mysql_fetch_assoc($req5mOKR))!== false) {
$TTIMOKR = $data5mOKR["numb"];
}
while ( ($data5mKOR = mysql_fetch_assoc($req5mKOR))!== false) {
$TTIMKOR = $data5mKOR["numb"];

}
while ( ($data5hOKR = mysql_fetch_assoc($req5hOKR))!== false) {
$TTIHOKR = $data5hOKR["numb"];
}
while ( ($data5hKOR = mysql_fetch_assoc($req5hKOR))!== false) {
$TTIHKOR = $data5hKOR["numb"];

if (( $TTILKOR + $TTIMKOR + $TTIHKOR)== 0){ $TTI5 = 0;}
else { 

$TTI5 = ($TTIHOKR) /($TTIHKOR) *100;
$TTI5= round( $TTI5, 2);
}
}
while ( ($data6lOKR = mysql_fetch_assoc($req6lOKR))!== false) {
$TTRLOKR = $data6lOKR["numb"];
}
while ( ($data6lKOR = mysql_fetch_assoc($req6lKOR))!== false) {
$TTRLKOR = $data6lKOR["numb"];

}
while ( ($data6mOKR = mysql_fetch_assoc($req6mOKR))!== false) {
$TTRMOKR = $data6mOKR["numb"];
}
while ( ($data6mKOR = mysql_fetch_assoc($req6mKOR))!== false) {
$TTRMKOR = $data6mKOR["numb"];

}
while ( ($data6hOKR = mysql_fetch_assoc($req6hOKR))!== false) {
$TTRHOKR = $data6hOKR["numb"];
}
while ( ($data6hKOR = mysql_fetch_assoc($req6hKOR))!== false) {
$TTRHKOR = $data6hKOR["numb"];
if (( $TTRLKOR + $TTRMKOR + $TTRHKOR)== 0){ $TTR5 = 0;}
else { 
$TTR5 = ($TTRHOKR) /($TTRHKOR) *100;
$TTR5= round( $TTR5, 2);
}
}
while ( ($data7R = mysql_fetch_assoc($req7R))!== false) {
$billable5 = $data7R["billable"];
}
while ( ($data8R = mysql_fetch_assoc($req8R))!== false) {
$interne5 = $data8R["interne"];
}



echo "<center><table id='example1'class='sample'><tr><td class='sample2' rowspan=2><center><b>CLIENTS</td><td class='sample2'colspan=4><center><b>TICKETS <br>OUVERTS</td><td class='sample2' colspan=4><center><b>TICKETS <br>EN COURS</td><td class='sample2' colspan=4><center><b>TICKETS <br>RESOLUS</td></tr>
<tr><td class='sample2'><center><b>L</td><td class='sample2'><center><b>M</td><td class='sample2'><center><b>H</td><td class='sample2'><center><b>C</td><td class='sample2'><center><b>L</td><td class='sample2'><center><b>M</td><td class='sample2'><center><b>H</td><td class='sample2'><center><b>C</td><td class='sample2'><center><b>L</td><td class='sample2'><center><b>M</td><td class='sample2'><center><b>H</td><td class='sample2'><center><b>C</td></tr>";

	echo "<tr><td class='sample2'><center><b>ASPARTAM</b></center></td><td class='sample'><center>".$new3l."</center></td><td class='sample'><center>".$new3m."</center></td><td class='sample'><center>".$new3h."</center></td><td class='sample'><center>".$new3c."</center></td><td class='sample'><center>".$open3l. "</center></td><td class='sample'><center>".$open3m."</center> </td><td class='sample'><center>".$open3h."</center> </td><td class='sample'><center>".$open3c."</center></td><td class='sample'><center>".$resolved3l."</center></td><td class='sample'><center>".$resolved3m."</center> </td><td class='sample'><center>".$resolved3h."</center> </td><td class='sample'><center>".$resolved3c."</center></td></tr>";
	
    echo "<tr><td class='sample2'><center><b>CFF</b></center></td><td class='sample'><center>".$new2l."</center></td><td class='sample'><center>".$new2m."</center></td><td class='sample'><center>".$new2h."</center></td><td class='sample'><center>".$new2c."</center></td><td class='sample'><center>".$open2l. "</center></td><td class='sample'><center>".$open2m."</center> </td><td class='sample'><center>".$open2h."</center> </td><td class='sample'><center>".$open2c."</center></td><td class='sample'><center>".$resolved2l."</center></td><td class='sample'><center>".$resolved2m."</center> </td><td class='sample'><center>".$resolved2h."</center> </td><td class='sample'><center>".$resolved2c."</center></td></tr>";
	
	echo "<tr><td class='sample2'><center><b>ELIPSOS</b></center></td><td class='sample'><center>".$new4l."</center></td><td class='sample'><center>".$new4m."</center></td><td class='sample'><center>".$new4h."</center></td><td class='sample'><center>".$new4c."</center></td><td class='sample'><center>".$open4l. "</center></td><td class='sample'><center>".$open4m."</center> </td><td class='sample'><center>".$open4h."</center> </td><td class='sample'><center>".$open4c."</center></td><td class='sample'><center>".$resolved4l."</center></td><td class='sample'><center>".$resolved4m."</center> </td><td class='sample'><center>".$resolved4h."</center> </td><td class='sample'><center>".$resolved4c."</center></td></tr>";
	
	echo "<tr><td class='sample2'><center><b>NTV</b></center></td><td class='sample'><center>".$new1l."</center></td><td class='sample'><center>".$new1m."</center></td><td class='sample'><center>".$new1h."</center></td><td class='sample'><center>".$new1c."</center></td><td class='sample'><center>".$open1l. "</center></td><td class='sample'><center>".$open1m."</center> </td><td class='sample'><center>".$open1h."</center> </td><td class='sample'><center>".$open1c."</center></td><td class='sample'><center>".$resolved1l."</center></td><td class='sample'><center>".$resolved1m."</center> </td><td class='sample'><center>".$resolved1h."</center> </td><td class='sample'><center>".$resolved1c."</center></td></tr>";
	
	echo "<tr><td class='sample2'><center><b>RS</b></center></td><td class='sample'><center>".$new5l."</center></td><td class='sample'><center>".$new5m."</center></td><td class='sample'><center>".$new5h."</center></td><td class='sample'><center>".$new5c."</center></td><td class='sample'><center>".$open5l. "</center></td><td class='sample'><center>".$open5m."</center> </td><td class='sample'><center>".$open5h."</center> </td><td class='sample'><center>".$open5c."</center></td><td class='sample'><center>".$resolved5l."</center></td><td class='sample'><center>".$resolved5m."</center> </td><td class='sample'><center>".$resolved5h."</center> </td><td class='sample'><center>".$resolved5c."</center></td></tr>";

	

echo "</table><br><br>";


echo "<center><table id='example1'class='sample'><tr><td class='sample2'><center><b>CLIENTS</td><td class='sample2'><b>% TTI OK</td><td class='sample2'><b>% TTR OK</td><td class='sample2'><center><b>TICKETS <br>FACTURABLES</td><td class='sample2'><center><b>TICKETS RESOLUS <br>EN INTERNE</td></tr>";

	echo "<tr><td class='sample2'><center><b>ASPARTAM</b></center></td><td class='sample'><center>".$TTI3. " %</center></td><td class='sample'><center>".$TTR3." %</center> </td><td class='sample'><center>".$billable3."</center> </td><td class='sample'><center>".$interne3."</center></td></tr>";
	
    echo "<tr><td class='sample2'><center><b>CFF</b></center></td><td class='sample'><center>".$TTI2. " %</center></td><td class='sample'><center>".$TTR2." %</center> </td><td class='sample'><center>".$billable2."</center> </td><td class='sample'><center>".$interne2."</center></td></tr>";
	
	echo "<tr><td class='sample2'><center><b>ELIPSOS</b></center></td><td class='sample'><center>".$TTI4. " %</center></td><td class='sample'><center>".$TTR4." %</center> </td><td class='sample'><center>".$billable4."</center> </td><td class='sample'><center>".$interne4."</center></td></tr>";
	
	echo "<tr><td class='sample2'><center><b>NTV</b></center></td><td class='sample'><center>".$TTI1. " %</center></td><td class='sample'><center>".$TTR1." %</center> </td><td class='sample'><center>".$billable1."</center> </td><td class='sample'><center>".$interne1."</center></td></tr>";
	
	echo "<tr><td class='sample2'><center><b>RS</b></center></td><td class='sample'><center>".$TTI5. " %</center></td><td class='sample'><center>".$TTR5." %</center> </td><td class='sample'><center>".$billable5."</center> </td><td class='sample'><center>".$interne5."</center></td></tr>";

	
echo "</table>";


// on ferme la connexion à mysql 
mysql_close(); 	


?>
<center><br>
<b>TTI et TTR appliqués uniquement au traitement des incidents résolus de production</b><br><br>

<a href="#" onclick="window.history.back();return false;">Retour au choix des dates</a></br></br>
		</center>
		
	  </body>
</html>