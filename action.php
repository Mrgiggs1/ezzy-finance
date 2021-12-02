<?php
 include'dbconnection.php';
 $output='';
 
 if(isset($_POST['query'])){
	 $search= $_POST['query'];
	 $stmt = $con->prepare("select * from user where fName like CONCAT('%',?,'%') OR lName like CONCAT('%',?,'%')");
	 $stmt->bind_param("ss",$search,$search);
	 
 }
 else{
	$stmt = con->prepare("select * from user"); 
 }
$stmt->excute();
$result = $stmt->get_result();

	if($result->num_rows >0 ){
		$output="<thead>
					<tr>
						<th>Surname</th>
						<th>First Name</th>
						<th>Loan Status</th>
						<th>Email</th>
						<th>Phone No</th>
					</tr>
				</thead>
		<tbody>";
		while($play=$result->fetch_assoc())
		{
			$output .="
			<tr>
				<td>".$play['lName']."</td>
				<td>".$play['fName']."</td>
				<td>Inactive</td>
				<td>".$play['email']."</td>
				<td>0".$play['phoneNo']."</td>
			</tr>";
		}
		output .="</tbody>">;
		echo $output;
	}
	else
	{
		echo "<h3>No record found</h3>";
	}
?>