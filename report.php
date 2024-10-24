<?php
 $title = 'Reports';
 $page = 'report';
 include_once('./assets/header.php');
 include_once('./assets/navbar.php');

?>
<?php
    include 'db.php';
    $month = isset($_GET['month']) ? $_GET['month'] : date('Y-m');
?>
<body>

<div class="container">
<!--<h3>Reports Section</h3>-->
<label for="month" style="font-size: 19px;"><b>Month</b></label>
    <div class="col-sm-3">
        <input type="month" name="month" id="month" value="<?php echo $month ?>" class="form-control">
    </div>

    <table class="table table-bordered" id='report-list'>
    <thead>
    <tr>
        <th class="text-center">#</th>
        <th class="">Date</th>
        <th class="">Invoice</th>
        <th class="">Guest Name</th>
        <th class="">Amount</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <?php
        $i = 1;
        $total = 0;
        $sales = $database->query("SELECT * FROM bill where g_total > 0 and date_format(date_created,'%Y-%m') = '$month' order by unix_timestamp(date_created) asc ");
        if($sales->num_rows > 0):
			    while($row = $sales->fetch_array()):
                $total += $row['g_total'];
			  ?>
      
      <td><?php echo $i++ ?></td>
      <td>
          <p> <b><?php echo date("M d,Y",strtotime($row['date_created'])) ?></b></p>
      </td>
      <td>
           <p> <b><?php echo $row['g_total'] > 0 ? $row['bill_id'] : 'N/A' ?></b></p>
      </td>
      <td>
           <p> <b><?php echo $row['guest_name'] ?></b></p>
      </td>
      <td>
            <p class="text-right"> <b><?php echo number_format($row['g_total'],2) ?></b></p>
      </td>
    </tr>
    <?php 
        endwhile;
        else:
    ?>
     <tr>
        <th class="text-center" colspan="5">No Data.</th>
      </tr>
    <?php 
         endif;
    ?>
			        
    </tbody>
    <tfoot>
      <tr>
         <th colspan="4" class="text-right">Total</th>
          <th class="text-right"><?php echo number_format($total,2) ?></th>
      </tr>
    </tfoot>
    </table>

    <div class="col-md-12 mb-4">
            <center>
            <button class="btn btn-success btn-sm col-sm-3" type="button" id="print"><i class="fa fa-print"></i> Print</button>
            </center>
    </div>
      

</div>

<noscript>
	<style>
		table#report-list{
			width:100%;
			border-collapse:collapse
		}
		table#report-list td,table#report-list th{
			border:1px solid
		}
        p{
            margin:unset;
        }
		.text-center{
			text-align:center
		}
        .text-right{
            text-align:right
        }
	</style>
</noscript>
<script>
$('#month').change(function(){
    location.replace('report.php?page=report&month='+$(this).val())
})
$('#print').click(function(){
		var _c = $('#report-list').clone();
		var ns = $('noscript').clone();
            ns.append(_c)
		var nw = window.open('','_blank','width=900,height=600')
		nw.document.write('<p class="text-center"><b>Order Report as of <?php echo date("F, Y",strtotime($month)) ?></b></p>')
		nw.document.write(ns.html())
		nw.document.close()
		nw.print()
		setTimeout(() => {
			nw.close()
		}, 500);
	})
</script>

</body>
</html>