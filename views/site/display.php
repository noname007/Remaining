
<form action=""　method="get">

	<span>新增一笔开销记录： <?php echo date("Y-m-d");?></span> <input type="text" name="money" placeholder="钱数">
	<input type="text" name="desc" placeholder="详细描述">
	<input type="submit" name="sub" value="提交">
</form>
<table border="1px" >
<hr/>
<?php 
	echo "<tr><td>时间</td><td>钱</td><td>详细描述</td></tr>";
	foreach($rows as $row){
		echo "<tr>";
		echo "<td>",$row->create_at,"</td><td>",$row->amount+0,"</td><td>",$row->detail,"</td>";
		echo "</tr>";
	}
?>
</table>