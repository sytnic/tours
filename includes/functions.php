<?php

// Test if there was a query error
	function confirm_query($result_set) {
		if (!$result_set){
		die("Database query failed. Function confirm_query() failed or its using in others func-s failed.");}
	}
	
function find_courier_by_id($got_id) { 
		global $connection;
		
		$safe_got_id = mysqli_real_escape_string($connection, $got_id);
		
		$query  = "SELECT * ";
		$query .= " FROM couriers";
		$query .= " WHERE id = {$safe_got_id} ";
		$query .= " LIMIT 1";
		$courier_set = mysqli_query($connection, $query);
		// Test if there was a query error
		confirm_query($courier_set);
		
		if ($courier = mysqli_fetch_assoc($courier_set)) {
			return $courier; // $courier == $courier_array as row from db
		} else {
			return null;
		}		
	}
	
function find_region_by_id($got_id) { 
		global $connection;
		
		$safe_got_id = mysqli_real_escape_string($connection, $got_id);
		
		$query  = "SELECT * ";
		$query .= " FROM regions";
		$query .= " WHERE id = {$safe_got_id} ";
		$query .= " LIMIT 1";
		$region_set = mysqli_query($connection, $query);
		// Test if there was a query error
		confirm_query($region_set);
		
		if ($region = mysqli_fetch_assoc($region_set)) {
			return $region; // $region == $region_array as row from db
		} else {
			return null;
		}		
	}
	
function unix_to_date($unix_time) {
	return strftime("%d.%m.%y", $unix_time);	
}
	
	
