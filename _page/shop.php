
<div class="container">
<div class="mt-5 card border-0 shadow mb-3">
 <div class="col-lg-12">
<div>
                            <div class="card-header bg-dark" style="color:#FFF"><b><i class="fas fa-cart-arrow-down" aria-hidden="true"></i></b> เลือกเชิฟเวอร์ที่ท่านต้องการ</div>
                            <div class="card-body">
							
              <?php
		if(!isset($_SESSION['uid']) || !isset($_SESSION['username']))
		{
			include_once '_page/alertLogin.php';
		}
		else
		{
			?>
      <hr>
							<div class="row mb-3">
							<div class="dropdown col-auto show">
							  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-server"></i>	เลือกเซิฟเวอร์
							  </a>
							  
								<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                             <?php
                                    $sql_bungeecord = 'SELECT * FROM bungeecord';
                                      $query_bungeecord = $connect->query($sql_bungeecord);
                                      while($server_bungeecord = $query_bungeecord->fetch_assoc())
                                      {
                                        if(isset($_GET['category']))
                                        {
                                          echo '<a href="?page=shop&category='.$_GET['category'].'&server='.$server_bungeecord['id'].'" class="dropdown-item">'.$server_bungeecord['name_server'].'</a>';
                                        }
                                        else
                                        {
                                          echo '<a href="?page=shop&server='.$server_bungeecord['id'].'" class="dropdown-item">'.$server_bungeecord['name_server'].'</a>';
                                        }
                                      }

                                  ?>
								</div>
							</div>
								  
								  
							<div class="dropdown col-auto show">
							  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-cart-plus"></i>	หมวดหมู่สินค้า
							  </a>
				
							  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
								<?php 
									$sql_cat = $connect->query('SELECT * FROM category');
									while($result__ = $sql_cat->fetch_assoc()) {
										
								
								?>
								<a class="dropdown-item" href="?page=shop&category=<?php echo $result__['id']; ?>&server=<?php echo $_GET['server']?>"><?php echo $result__['name']; ?></a>
								<?php 
									}
								?>
							  </div>
							</div>
								  </div>
                                   <hr/>
                            <div class="row"><br>
                             <?php
                                if(isset($_GET['page']) && $_GET['page'] != 'shop')
                                {
                                  $sql_product = 'SELECT * FROM shop ORDER BY id DESC';
                                }
                                else
                                {
                                  $sql_product = 'SELECT * FROM shop';
                                }

                                if(isset($_GET['server']) && is_numeric($_GET['server']))
                                {
                                  $sql_product .= ' WHERE server_id = "'.$_GET['server'].'"';
                                }

                                if(isset($_GET['category']) && is_numeric($_GET['category']))
                                {
                                  if(isset($_GET['server']) && is_numeric($_GET['server']))
                                  {
                                    $sql_product .= ' AND category = "'.$_GET['category'].'"';
                                  }
                                  else
                                  {
                                    $sql_product .= ' WHERE category = "'.$_GET['category'].'"';
                                  }
                                }

                                if(isset($_GET['page']) && $_GET['page'] != 'shop')
                                {
                                  $sql_product .= ' LIMIT 6';
                                }
                                elseif(!isset($_GET['page']))
                                {
                                  $sql_product .= ' LIMIT 6';
                                }

                                $query_product = $connect->query($sql_product);

                                if($query_product->num_rows <= 0)
                                {
                                  echo "<h5 class='col-md-12 text-center'>เลือกเซิฟเวอร์ที่จะซื้อครับ</h5>";
                                }
                                else
                                {
                                  while($product = $query_product->fetch_assoc())
                                  { ?>
                <div class="col-md-3">
            <div class="item" style="margin-bottom: 10px;">
              <div class="item-image">
              <a class="item-image-price"><?php echo number_format($product['price'], 2); ?> POINT</a>
              <center><img src="<?php echo $product['pic']; ?>"></center>
              <a class="item-image-bottom"><?php echo $product['name']; ?></a>
            </div>
              <div class="item-info">
                <div class="item-text">
				  <a style="font-size: 18px;"><?php echo $product['name']; ?></a><hr>
                  <a href="?page=confirm&id=<?php echo $product['id']; ?>" class="btn btn-primary w-100 mb-1 border-0">กดเพื่อซื้อสินค้า</a>
				  <hr/>
				  <p><?php echo $product['info']; ?></p>
				</div>
              </div>
            </div>
              </div> 
              <?php  } ?>
                            
                                <?php } } ?>
                                </div>
                            </div>
                        </div></div></div>
</div>