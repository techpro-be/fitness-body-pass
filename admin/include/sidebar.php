<?php $uname = $_GET['uname'];; ?>
<div class="span3">
					<div class="sidebar">


<ul class="widget widget-menu unstyled">
							<li>
								<a class="collapsed" data-toggle="collapse" href="#togglePages">
									<i class="menu-icon icon-cog"></i>
									<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
                                    La gestion des commandes
								</a>
								<ul id="togglePages" class="collapse unstyled">
<!--									<li>-->
<!--										<a href="delivered-orders.php?uname=--><?php //echo $uname; ?><!--">-->
<!--											<i class="icon-inbox"></i>-->
<!--											Open Orders-->
<!--								--><?php	//
//	$status='Delivered';
//$rt = mysqli_query($con,"SELECT * FROM Orders where orderStatus='$status'");
//$num1 = mysqli_num_rows($rt);
//{?><!--<b class="label green pull-right">--><?php //echo htmlentities($num1); ?><!--</b>-->
<?php //} ?>
<!---->
<!--										</a>-->
<!--									</li>-->
                                    <li><a href="manage-payments.php?uname=<?php echo $uname; ?>"><i class="menu-icon icon-table"></i>Gérer les paiements </a></li>
								</ul>
							</li>
							
							<li>
								<a href="manage-users.php?uname=<?php echo $uname; ?>">
									<i class="menu-icon icon-group"></i>
                                    Gérer les utilisateurs
								</a>
							</li>
						</ul>


						<ul class="widget widget-menu unstyled">
                                <li><a href="category.php?uname=<?php echo $uname; ?>"><i class="menu-icon icon-tasks"></i> Créer une catégorie</a></li>
                                <li><a href="subcategory.php?uname=<?php echo $uname; ?>"><i class="menu-icon icon-tasks"></i> Sous-catégorie </a></li>
                                <li><a href="insert-product.php?uname=<?php echo $uname; ?>"><i class="menu-icon icon-paste"></i>Insérer un produit</a></li>
                                <li><a href="manage-products.php?uname=<?php echo $uname; ?>"><i class="menu-icon icon-table"></i>Gérer les produits </a></li>
<!--                                <li><a href="manage-payments.php?uname=--><?php //echo $uname; ?><!--"><i class="menu-icon icon-table"></i>Gérer les paiements </a></li>-->
                        </ul>


                            <ul class="widget widget-menu unstyled">
                                <li><a href="news-category.php?uname=<?php echo $uname; ?>"><i class="menu-icon icon-tasks"></i>Créer une catégorie d'actualités </a></li>
                                <li><a href="insert-news.php?uname=<?php echo $uname; ?>"><i class="menu-icon icon-tasks"></i>Insérer des nouvelles </a></li>
                                <li><a href="manage-news.php?uname=<?php echo $uname; ?>"><i class="menu-icon icon-tasks"></i>Gérer les actualités </a></li>
                        
                            </ul><!--/.widget-nav-->

						<ul class="widget widget-menu unstyled">
							<li><a href="user-logs.php?uname=<?php echo $uname; ?>"><i class="menu-icon icon-tasks"></i>Journal de connexion de l'utilisateur </a></li>
							
							<li>
								<a href="logout.php">
									<i class="menu-icon icon-signout"></i>
                                    Se déconnecter
								</a>
							</li>
						</ul>

					</div><!--/.sidebar-->
				</div><!--/.span3-->
