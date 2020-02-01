
<?php
session_start();
include('include/config.php');
if(!isset($_GET['uname']))
{
    header('location:index.php');
}
else{
    $nid=intval($_GET['id']);// news id
    if(isset($_POST['submit']))
    {
        $newscategory=$_POST['newsCategory'];
        $newsname=$_POST['newsName'];
        $newsdescription=$_POST['newsDescription'];

        $sql=mysqli_query($con,"update  news set newscategory='$newscategory',newsName='$newsname',newsDescription='$newsdescription' where id='$nid' ");
        $_SESSION['msg']="Produit mis à jour avec succès !!";

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
        // function getSubcat(val) {
        //     $.ajax({
        //         type: "POST",
        //         url: "get_subcat.php",
        //         data:'cat_id='+val,
        //         success: function(data){
        //             $("#subcategory").html(data);
        //         }
        //     });
        // }
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
                            <h3>Insérer un programm</h3>
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

                            <form class="form-horizontal row-fluid" name="insertnews" method="post" enctype="multipart/form-data">

                                <?php

                                $query=mysqli_query($con,"select news.*,newscategory.newsCategoryName as newscatname,newscategory.id as newscid from news join newscategory on newscategory.id=news.newsCategory  where news.id='$nid'");
                                $cnt=1;
                                while($row=mysqli_fetch_array($query))
                                {



                                    ?>


                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Catégorie</label>
                                        <div class="controls">
                                            <select name="newsCategory" class="span8 tip" onChange="getSubcat(this.value);"  required>
                                                <option value="<?php echo htmlentities($row['newscid']);?>"><?php echo htmlentities($row['newscatname']);?></option>
                                                <?php $query=mysqli_query($con,"select * from newscategory");
                                                while($rw=mysqli_fetch_array($query))
                                                {
                                                    if($row['newscatname']==$rw['newsCategoryName'])
                                                    {
                                                        continue;
                                                    }
                                                    else{
                                                        ?>

                                                        <option value="<?php echo $rw['id'];?>"><?php echo $rw['newsCategoryName'];?></option>
                                                    <?php }} ?>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Nom du produit</label>
                                        <div class="controls">
                                            <input type="text"    name="newsName"  placeholder="Entrez le nom du programme" value="<?php echo htmlentities($row['newsName']);?>" class="span8 tip" >
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Description du programme</label>
                                        <div class="controls">
                                            <input type="text"    name="newsDescription"  placeholder="Entrez la description du programme" value="<?php echo htmlentities($row['newsDescription']);?>" class="span8 tip" >
                                        </div>
                                    </div>



                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Image du programme</label>
                                        <div class="controls">
                                            <img src="newsimages/<?php echo htmlentities($nid);?>/<?php echo htmlentities($row['newsImage1']);?>" width="200" height="100"> <a href="update-image1.php?id=<?php echo $row['id'];?>">Changer l'image</a>
                                        </div>
                                    </div>

                                <?php } ?>
                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" name="submit" class="btn">Mise à jour</button>
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