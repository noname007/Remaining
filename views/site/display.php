<?php 
	use app\models\Ulity;
	$year = date("Y");
	$month = date("m");
	$day = date('d');

// 	$option_value = $year.'-'.$month.'-';
?>
<form action=""　method="get">

	<span>新增一笔开销记录： <?php echo date("Y-m-d");?></span> 
	
	<select name="year">
		<?php for ($i=-2;$i<2;++$i): ?>
			<?php echo '<option value=',$year+$i,Ulity::is_selected('year', $year + $i),'>',$year+$i,'</option>'?>
		<?php endfor ?>
	</select>
	<select name="month">
		<?php for ($i=1;$i<13;++$i): ?>
			<?php echo '<option value=',$i,Ulity::is_selected('month', $i),'>',$i,'</option>'?>
		<?php endfor ?>
	</select>
	
	<select name="day">
		<?php for ($i=1;$i<32;++$i): ?>
			<?php echo '<option value=',$i,Ulity::is_selected('day',$i),'>',$i,'</option>'?>
		<?php endfor ?>
	</select>
	
	
	<input type="text" name="money" placeholder="钱数">
	<input type="text" name="desc" placeholder="详细描述">
	<input type="submit" name="sub" value="提交">
</form>
<table border="1px" >
<hr/>
<?php 
	echo "<tr><td>时间</td><td>钱</td><td>详细描述</td></tr>";
	foreach($rows as $row){
		echo "<tr>";
		echo "<td>",$row->consume_time,"</td><td>",$row->amount+0,"</td><td>",$row->detail,"</td>";
		echo "</tr>";
	}
?>
</table>