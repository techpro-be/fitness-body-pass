<?php
include('include/config.php');
if(!empty($_POST["ncat_id"]))
{
    $nid=intval($_POST['ncat_id']);
    $query=mysqli_query($con,"SELECT * FROM newscategory WHERE id=$nid");
    ?>
    <option value="">Select Subcategory</option>
    <?php
    while($row=mysqli_fetch_array($query))
    {
        ?>
        <option value="<?php echo htmlentities($row['nid']); ?>"><?php echo htmlentities($row['newsCategoryName']); ?></option>
        <?php
    }
}
?>