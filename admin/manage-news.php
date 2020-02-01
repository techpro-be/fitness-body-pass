
<?php
session_start();
include('include/config.php');
if(!isset($_GET['uname']))
{
    header('location:index.php');
}
else{
    date_default_timezone_set('Europe/Malta');// change according timezone
    $currentTime = date( 'd-m-Y h:i:s A', time () );

    if(isset($_GET['del']))
    {
        mysqli_query($con,"delete from news where id = '".$_GET['id']."'");
        $_SESSION['delmsg']="Programme supprimé !!";
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| Gérer les programmes</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
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
                            <h3>Gérer les programmes</h3>
                        </div>
                        <div class="module-body table">
                            <?php if(isset($_GET['del']))
                            {?>
                                <div class="alert alert-error">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
                                </div>
                            <?php } ?>

                            <br />


                            <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Catégorie </th>
                                    <th>Nom du programm</th>
                                    <th>Description des programmes</th>
                                    <th>Date de création du programme</th>
<!--                                    <th>Date de mise à jour du programme</th>-->
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

<!--                                --><?php //$query=mysqli_query($con,"news.*,newscategory.newsCategoryName from news join newscategory on newscategory.id=news.newscategory");  //select news.*,newscategory.newsCategoryName from news join newscategory on newscategory.id=news.newscategory
//                                    $cnt=1;
//                                while($row=mysqli_fetch_array($query))
//                                {
//                                    ?>



<?php $query=mysqli_query($con,"select news.*,newscategory.newsCategoryName from news join newscategory on newscategory.id=news.newsCategory");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
    ?>
                                    <tr>
                                        <td><?php echo htmlentities($cnt);?></td>
                                        <td><?php echo htmlentities($row['newsCategoryName']);?></td>
                                        <td><?php echo htmlentities($row['newsName']);?></td>
                                        <td><?php echo htmlentities(substr($row['newsDescription'],0,20));?></td>

<!--                                        <td>--><?php //echo htmlentities($row['newsDescription']);?><!--</td>-->
                                        <td> <?php echo htmlentities($row['postingDate']);?></td>
<!--                                        <td>--><?php //echo htmlentities($row['updationDate']);?><!--</td>-->
                                        <td>
                                            <a href="edit-news.php?uname=<?php echo $uname; ?>&id=<?php echo $row['id']?>" ><i class="icon-edit"></i></a>
                                            <a href="manage-news.php?uname=<?php echo $uname; ?>&id=<?php echo $row['id']?>&del=delete" onClick="return confirm('\n'+'Etes-vous sûr que vous voulez supprimer?')"><i class="icon-remove-sign"></i></a>
                                        </td>
                                    </tr>
                                    <?php $cnt=$cnt+1; } ?>

                            </table>
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