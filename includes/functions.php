<?php

// Test if there was a query error
	function confirm_query($result_set) {
		if (!$result_set){
		die("Database query failed. Function confirm_query failed or its using in others func-s failed.");}
	}

function find_all_pages() { 
		global $connection;
		// 2. Perform database query
		$query  = "SELECT * ";
		$query .= "FROM pages ";
			$query .= "WHERE visible = 1 ";	
		$query .= "ORDER BY number ASC";
		$page_set = mysqli_query($connection, $query);
		// Test if there was a query error
		confirm_query($page_set);
		return $page_set;
	}
	
	
