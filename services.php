<?php
include 'conndb.php';
if(isset($_POST))
{
	$mas_ins = "insert into backgrounds_services(`visible`) VALUES('1')";
	$mas_ins = mysqli_query($conn,$mas_ins);
	if($mas_ins)
	{
		$mas_sql = "SELECT source_id FROM backgrounds_services order BY source_id DESC limit 1";
		$mas_sql = mysqli_query($conn,$mas_sql);
		$mas_sql = $mas_sql->fetch_assoc();
		$bg_sql = "INSERT INTO `background_child`(`bgimg_id`, `type`, `url`) VALUES (".$mas_sql['source_id'].",'home','".$_POST['home_bg']."'), (".$mas_sql['source_id'].",'customize','".$_POST['cust_bg']."')";
		$query_bg = mysqli_query($conn,$bg_sql);
		if (!$query_bg) 
		{
			echo mysqli_error($conn);
		}
	}
	else {
		echo mysqli_error($conn);
	}
		$sql = "insert into service_child(`service_id`,`name`,`description`,`icon`) VALUES";
		for($i=0;$i<count($_POST['service_name']);$i++)
		{
			$sql = $sql."('{$mas_sql['source_id']}','{$_POST['service_name'][$i]}','{$_POST['service_desc'][$i]}','{$_POST['service_icon'][$i]}')";
			if($i != count($_POST['service_name'])-1)
			{
				$sql = $sql.',';
			}
		}
		echo $sql;
		$sql = mysqli_query($conn,$sql);
		if($sql)
		{
			echo "Success";
		}
		else
		{
			echo mysqli_error($conn);
		}
	}	
if(isset($_GET) && isset($_GET['id']))
{
	$mas_sql = "SELECT source_id FROM backgrounds_services order BY source_id DESC limit 1";
	$mas_sql = mysqli_query($conn,$mas_sql);
	$mas_sql = $mas_sql->fetch_assoc();
	$bg_sql = "select * from background_child where bgimg_id='".$mas_sql['source_id']."'";
	$bg_query = mysqli_query($conn,$bg_sql);
	if($bg_query->num_rows > 0)
	{
		while ($row = $bg_query->fetch_assoc()) {
			print_r($row);
			echo "<br>";
		}
	}
	echo "<br><br>";

	$ser_sql = "select * from service_chilld where service_id='".$mas_sql['source_id']."'";
	$ser_sql = mysqli_query($conn,$ser_sql);	
	if($ser_sql->num_rows > 0)
	{
		while ($row = $ser_sql->fetch_assoc()) {
	?>
	<div class="col-md-4">
			          <div class="service-box">
			            <div class="service-ico">
			              <span class="ico-circle"><i class="material-icons"><?php echo $row['icon'];?></i></span>
			            </div>
			            <div class="service-content">
			              <h2 class="s-title"><?php echo $row['name'];?></h2>
			              <p class="s-description text-center">
			                <?php echo $row['description'];?>
			              </p>
			            </div>
			          </div>
			        </div>
	<?php
		}
	}
}
?>