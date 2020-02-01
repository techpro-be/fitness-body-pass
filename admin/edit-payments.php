
<?php
session_start();
include('include/config.php');
if(!isset($_GET['uname']))
{
    header('location:index.php');
}
else{
    $paymentid=intval($_GET['id']);// payment id
    if(isset($_POST['submit']))
    {
        $email=$_POST['email'];
        $amount=$_POST['amount'];
        $payment_status=$_POST['payment_status'];
        $currency_code=$_POST['currency_code'];
        $payment_category=$_POST['payment_category'];


        $sql=mysqli_query($con,"update  tbl_payment set email='$email',amount='$amount',payment_status='$payment_status',currency_code='$currency_code',productDescription='$productdescription',payment_category='$payment_category' where id='$paymentid' ");
        $_SESSION['msg']="Payment Updated Successfully !!";

    }


    ?>
    <!DOCTYPE html>
    <html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| Insert Product</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

    <script>
        function getSubcat(val) {
            $.ajax({
                type: "POST",
                url: "get_subcat.php",
                data:'cat_id='+val,
                success: function(data){
                    $("#subcategory").html(data);
                }
            });
        }
        function selectCountry(val) {
            $("#search-box").val(val);
            $("#suggesstion-box").hide();
        }
    </script>


</head>
<body>
<?php include('include/header.php');?>

<div class="wrapper">
    <div class="container">
        <div class="row">
            <?php include('include/sidebar.php');?>
            <div class="span9">
                <div class="content">

                    <div class="module">
                        <div class="module-head">
                            <h3>Insert Product</h3>
                        </div>
                        <div class="module-body">

                            <?php if(isset($_POST['submit']))
                            {?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                                </div>
                            <?php } ?>


                            <?php if(isset($_GET['del']))
                            {?>
                                <div class="alert alert-error">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
                                </div>
                            <?php } ?>

                            <br />

                            <form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">

                                <?php

                                $query=mysqli_query($con,"select products.*,category.categoryName as catname,category.id as cid,subcategory.subcategory as subcatname,subcategory.id as subcatid from products join category on category.id=products.category join subcategory on subcategory.id=products.subCategory where products.id='$pid'");
                                $cnt=1;
                                while($row=mysqli_fetch_array($query))
                                {?>

<!--                                --><?php
//
//                                    $query=mysqli_query($con,"select products.*,category.categoryName as catname,category.id as cid,subcategory.subcategory as subcatname,subcategory.id as subcatid from products join category on category.id=products.category join subcategory on subcategory.id=products.subCategory where products.id='$pid'");
//                                    $cnt=1;
//                                while($row=mysqli_fetch_array($query))
//                                {?>


                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Category</label>
                                        <div class="controls">
                                            <select name="category" class="span8 tip" onChange="getSubcat(this.value);"  required>
                                                <option value="<?php echo htmlentities($row['cid']);?>"><?php echo htmlentities($row['catname']);?></option>
                                                <?php $query=mysqli_query($con,"select * from paymentcategory");
                                                while($rw=mysqli_fetch_array($query))
                                                {
                                                    if($row['catname']==$rw['categoryName'])
                                                    {
                                                        continue;
                                                    }
                                                    else{
                                                        ?>

                                                        <option value="<?php echo $rw['id'];?>"><?php echo $rw['paymentCategoryName'];?></option>
                                                    <?php }} ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Payment Email</label>
                                        <div class="controls">
                                            <input type="text"    name="productName"  placeholder="Enter Payment Name" value="<?php echo htmlentities($row['email']);?>" class="span8 tip" >
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Payment Amount</label>
                                        <div class="controls">
                                            <input type="text"    name="productprice"  placeholder="Enter Payment Price" value="<?php echo htmlentities($row['amount']);?>" class="span8 tip" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Payment Status</label>
                                        <div class="controls">
                                        <textarea  name="productDescription"  placeholder="Enter Payment Status" rows="6" class="span8 tip">
                                        <?php echo htmlentities($row['payment_status']);?>
                                        </textarea>
                                        </div>
                                    </div>


                                <?php } ?>
                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" name="submit" class="btn">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>





                </div><!--/.content-->
            </div><!--/.span9-->
        </div>
    </div><!--/.container-->
</div><!--/.wrapper-->

<?php include('include/footer.php');?>

<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
<script src="scripts/datatables/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('.datatable-1').dataTable();
        $('.dataTables_paginate').addClass("btn-group datatable-pagination");
        $('.dataTables_paginate > a').wrapInner('<span />');
        $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
        $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
    } );
</script>
</body>
<?php } ?>