
<?php
session_start();
include('include/config.php');
if(!isset($_GET['uname']))
{
    header('location:index.php');
}
else{

    if(isset($_POST['submit']))
    {
        $newscategory=$_POST['newscategory'];
        $newsname=$_POST['newsName'];
        $newsdescription=$_POST['newsDescription'];
        $newsimage1=$_FILES["newsimage1"]["name"];

//for getting product id
        $query=mysqli_query($con,"select max(id) as nid from news");
        $result=mysqli_fetch_array($query);
        $newsid=$result['nid']+1;
        $dir="newsimages/$newsid";
        if(!is_dir($dir)){
            mkdir("newsimages/".$newsid);
        }

        move_uploaded_file($_FILES["newsimage1"]["tmp_name"],"newsimages/$newsid/".$_FILES["newsimage1"]["name"]);
        $sql=mysqli_query($con,"insert into news(newsCategory,newsName,newsDescription,Image) values('$newscategory','$newsname','$newsdescription','$newsimage1')");
        $_SESSION['msg']="Product Inserted Successfully !!";

    }


    ?>
    <!DOCTYPE html>
    <html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| Insérer un produit</title>
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
                url: "get_newscat.php",
                data:'ncat_id='+val,
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
                            <h3>Insérer produit</h3>
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

                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Catégorie</label>
                                    <div class="controls">
                                        <select name="newscategory" class="span8 tip" onChange="getSubcat(this.value);"  required>
                                            <option value="">Choisir une catégorie</option>
                                            <?php $query=mysqli_query($con,"select * from newscategory");
                                            while($row=mysqli_fetch_array($query))
                                            {?>

                                                <option value="<?php echo $row['id'];?>"><?php echo $row['newsCategoryName'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

<!--                                <div class="control-group">-->
<!--                                    <label class="control-label" for="basicinput">Sous-catégorie</label>-->
<!--                                    <div class="controls">-->
<!--                                        <select name="subcategory" class="span8 tip" onChange="getSubcat(this.value);"  required>-->
<!--                                            <option value="">Sélectionnez une sous-catégorie</option>-->
<!--                                            --><?php //$query=mysqli_query($con,"select * from subcategory");
//                                            while($row=mysqli_fetch_array($query))
//                                            {?>
<!---->
<!--                                                <option value="--><?php //echo $row['id'];?><!--">--><?php //echo $row['subcategory'];?><!--</option>-->
<!--                                            --><?php //} ?>
<!--                                        </select>-->
<!--                                    </div>-->
<!--                                </div>-->

                                <!--<div class="control-group">-->
                                <!--<label class="control-label" for="basicinput">Sub Category</label>-->
                                <!--<div class="controls">-->
                                <!--<select   name="subcategory"  id="subcategory" class="span8 tip" required>-->
                                <!--</select>-->
                                <!--</div>-->
                                <!--</div>-->


                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Nom du produit</label>
                                    <div class="controls">
                                        <input type="text"    name="newsName"  placeholder="Entrez le nom du produit" class="span8 tip" required>
                                    </div>
                                </div>



<!--                                <div class="control-group">-->
<!--                                    <label class="control-label" for="basicinput">Description de la catégorie des actualités</label>-->
<!--                                    <div class="controls">-->
<!--                                        <textarea class="span8" name="newsDescription" rows="5"></textarea>-->
<!--                                    </div>-->
<!--                                </div>-->

                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Description du programme</label>
                                    <div class="controls">
                                        <input type="text"    name="newsDescription"  placeholder="Entrez la description du programme" class="span8 tip" >
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Image du produit</label>
                                    <div class="controls">
                                        <input type="file" name="newsimage1" id="productimage1" value="" class="span8 tip" required>
                                    </div>
                                </div>



                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" name="submit" class="btn">Insérer</button>
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