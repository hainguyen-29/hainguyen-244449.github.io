<?php 
	include('../database/connection-to-hainguyen.php');
	//select
	function select($table,$row,$user){
		global $connection;
		$query = mysqli_query($connection, "SELECT * FROM $table WHERE $row='$user'");
		return $row = mysqli_fetch_assoc($query);
	}

	function insert($id_u,$id_p){
		global $connection;
		$query_select = mysqli_query($connection, "SELECT * FROM user WHERE id='$id_u'");
		$row = mysqli_fetch_assoc($query_select);
		$query_insert = mysqli_query($connection, "INSERT INTO `oder`(`id_user`, `id_product`) VALUES ('$id_u','$id_p')");
		return $query_insert;
	}
//delete 1 row theo $id trong $talbe
	function delete($table,$id){
		global $connection;
		return $query = mysqli_query($connection,"DELETE FROM $table WHERE id='$id'");
	}

	
 ?>