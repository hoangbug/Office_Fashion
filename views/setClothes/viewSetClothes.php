   <!-- Breadcrumbs -->
   <div class="breadcrumbs bounceInUp animated">
     <div class="container">
       <div class="row">
         <div class="col-xs-12">
           <ul>
             <li class="home"> <a title="Go to Home Page" href="index.html">Home</a><span>» </span></li>
             <li class=""> <a title="Go to Home Page" href="index.php?page=men" style="text-transform: capitalize;"><?php if (isset($_GET['page']) && $_GET['page']) {
              echo $_GET['page'];
            } ?></a><span>» </span></li>
            <li class="category13"><strong>Tops & Tees</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End -->
  <!-- Main Container -->
  <section class="main-container col2-left-layout bounceInUp animated">
   <div class="page-header">
     <div class="container">
       <div class="row">
         <div class="col-xs-12">
           <h2>Tops & Tees</h2>
         </div>
       </div>
     </div>
   </div>
   <div class="container">
     <div class="row">
       <div class="col-main col-sm-9 col-sm-push-3">
         <article class="col-main">

           <div class="category-description std">
             <div class="slider-items-products">
               <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                 <div class="slider-items slider-width-col1 owl-carousel owl-theme">

                   <!-- Item -->
                   <div class="item"> <a href="#x"><img alt="" src="assets/images/women_banner.png"></a>
                     <div class="cat-img-title cat-bg cat-box">
                       <h2 class="cat-heading"><strong>New Fashion 2015</strong><br></h2>
                       <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus diam arcu.</p>
                     </div>
                   </div>
                   <!-- End Item -->

                   <!-- Item -->
                   <div class="item"> <a href="#x"><img alt="" src="assets/images/women_banner1.png"></a>

                   </div>

                   <!-- End Item -->

                 </div>
               </div>
             </div>
           </div>
           <div class="toolbar">
             <div class="sorter option_product">
               <div class="option">Liên Quan</div>
               <div class="option">Mới Nhất</div>
               <div class="option">Bán Chạy</div>
             </div>
             <div id="sort-by">
               <label class="left">Sort By: </label>
               <ul>
                 <li><a href="#">Position<span class="right-arrow"></span></a>
                   <ul>
                     <li><a href="#">Name</a></li>
                     <li><a href="#">Price</a></li>
                     <li><a href="#">Position</a></li>
                   </ul>
                 </li>
               </ul>
               <a class="button-asc left" href="#" title="Set Descending Direction"><span class="glyphicon glyphicon-arrow-up"></span></a>
             </div>
           </div>
           <div class="category-products">
             <ul class="products-grid">
               <?php
               if (!empty($getProductAllMen)) {
                foreach ($getProductAllMen as $value) {
                  ?>
                  <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                   <div class="item-inner">
                     <div class="item-img">
                       <div class="item-img-info"> <a href="index.php?page=clothesSet&method=productDetailSet&id=<?=$value['id']?>" title="<?= $value['product_name_sets']; ?>" class="product-image"> <img src="assets/images/products/<?= $value['image_sets']; ?>" alt="<?= $value['image_sets']; ?>" style="width: 100%; height: 260.64px;"> </a>
                         <?php if ($value['status'] != 0 && $value['status'] != 1) { ?>
                           <div class="new-label new-top-left"><?php if ($value['status'] == 2) {
                            echo "New";
                          } elseif ($value['status'] == 3) {
                            echo "Sale";
                          } else {
                            echo "Hot";
                          } ?></div>
                          <?php
                        } else {
                          echo "";
                        }
                        ?>
                        <div class="item-box-hover">
                         <div class="box-inner">
                           <div class="actions">
                             <div class="add_cart">
                               <a href="index.php?page=product&method=productDetail&id=<?= $value['id']; ?>"><button class="button btn-cart" type="button"><span>Add to Cart</span></button></a>
                             </div>
                             <div class="product-detail-bnt"><a product_id="<?= $value['id'] ?>" data-toggle="modal" data-target="#quickView" class="button detail-bnt quickViewProduct"><span>Quick View</span></a></div>
                             <span class="add-to-links"> <a href="wishlist.html" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a> <a href="compare.html" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                   <div class="item-info">
                     <div class="info-inner">
                       <div class="item-title"> <a href="product_detail.html" title="<?= $value['product_name_sets']; ?>"> <?= $value['product_name_sets']; ?> </a> </div>
                       <div class="item-content">
                         <div class="rating">
                           <div class="ratings">
                             <div class="rating-box">
                               <div class="rating" style="width:80%"></div>
                             </div>
                             <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                           </div>
                         </div>
                         <div class="item-price">
                           <div class="price-box">
                             <?php
                             if ($value['status'] != 0) {
                              if ($value['sale'] != 0) {
                                ?>
                                <p class="old-price"><span class="price-label">Regular
                                Price:</span> <span class="price"><?php echo number_format($value['price'], 0, '', '.'); ?> ₫
                                </span> </p>
                                <p class="special-price"><span class="price-label">Special
                                 Price</span> <span class="price"><?php $total = $value['price'] * ((100 - $value['sale']) / 100);
                                 echo number_format($total, 0, '', '.'); ?> ₫
                               </span> </p>
                               <?php
                             } else {
                              ?>
                              <p class="special-price"><span class="price-label">Special
                              Price</span> <span class="price"><?php echo number_format($value['price'], 0, '', '.'); ?> ₫
                              </span> </p>
                              <?php
                            }
                          } else {
                            ?>
                            <p class="special-price"><span class="price-label">Special
                            Price</span> <span class="price">Hết hàng</span> </p>
                            <?php
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <?php
          }
        }
        ?>
        <?php if (!empty($selectProduct)) {
          foreach ($selectProduct as $value) {
            ?>
            <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
             <div class="item-inner">
               <div class="item-img">
                 <div class="item-img-info"> <a href="index.php?page=clothesSet&method=productDetailSet&id=<?=$value['id']?>" title="<?= $value['product_name_sets']; ?>" class="product-image"> <img src="assets/images/products/<?= $value['image_sets']; ?>" alt="<?= $value['image_sets']; ?>" style="width: 100%; height: 260.64px;"> </a>
                   <?php if ($value['status'] != 0 && $value['status'] != 1) { ?>
                     <div class="new-label new-top-left"><?php if ($value['status'] == 2) {
                      echo "New";
                    } elseif ($value['status'] == 3) {
                      echo "Sale";
                    } else {
                      echo "Hot";
                    } ?></div>
                    <?php
                  } else {
                    echo "";
                  }
                  ?>
                  <div class="item-box-hover">
                   <div class="box-inner">
                     <div class="actions">
                       <div class="add_cart">
                         <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                       </div>
                       <div class="product-detail-bnt"><a product_id="<?= $value['id'] ?>" data-toggle="modal" data-target="#quickView" class="button detail-bnt quickViewProduct"><span>Quick View</span></a></div>
                       <span class="add-to-links"> <a href="wishlist.html" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a> <a href="compare.html" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
             <div class="item-info">
               <div class="info-inner">
                 <div class="item-title"> <a href="product_detail.html" title="<?= $value['product_name_sets']; ?>"> <?= $value['product_name_sets']; ?> </a> </div>
                 <div class="item-content">
                   <div class="rating">
                     <div class="ratings">
                       <div class="rating-box">
                         <div class="rating" style="width:80%"></div>
                       </div>
                       <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                     </div>
                   </div>
                   <div class="item-price">
                     <div class="price-box">
                       <?php
                       if ($value['status'] != 0) {
                        if ($value['sale'] != 0) {
                          ?>
                          <p class="old-price"><span class="price-label">Regular
                          Price:</span> <span class="price"><?php echo number_format($value['price'], 0, '', '.'); ?> ₫
                          </span> </p>
                          <p class="special-price"><span class="price-label">Special
                           Price</span> <span class="price"><?php $total = $value['price'] * ((100 - $value['sale']) / 100);
                           echo number_format($total, 0, '', '.'); ?> ₫
                         </span> </p>
                         <?php
                       } else {
                        ?>
                        <p class="special-price"><span class="price-label">Special
                        Price</span> <span class="price"><?php echo number_format($value['price'], 0, '', '.'); ?> ₫
                        </span> </p>
                        <?php
                      }
                    } else {
                      ?>
                      <p class="special-price"><span class="price-label">Special
                      Price</span> <span class="price">Hết hàng</span> </p>
                      <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </li>
      <?php
    }
  }
  ?>
</ul>

<?php if (isset($_GET['page']) && !empty($_GET['page']) && isset($_GET['cate_id']) && !empty($_GET['cate_id'])) {
  $page = $_GET['page'];
  $cate_id = $_GET['cate_id'];
  $count = ceil($countProductCate['count'] / $limit);
  ?>
  <div class="toolbar">
   <div class="pager">
     <div id="limiter">
       <label>View: </label>
       <ul>
         <li><a href="#">15<span class="right-arrow"></span></a>
           <ul>
             <li><a href="#">20</a></li>
             <li><a href="#">30</a></li>
             <li><a href="#">35</a></li>
           </ul>
         </li>
       </ul>
     </div>
     <div class="pages">
       <label style="line-height: 3;">Page:</label>
       <ul class="pagination">
         <li style="<?php if ($pages <= 1) {
          echo 'display: none;';
        } ?>">
        <a href="<?php if ($pages <= 1) {
          echo "";
          } else {
            echo "index.php?page=" . $page . "&cate_id=" . $cate_id . "&pages=" . $prev;
          } ?>">&laquo;</a>
        </li>
        <?php for ($i = $start; $i <= $end; $i++) { ?>
         <li class="<?php if ($pages == $i) {
          echo "active";
        } ?>">
        <a href="index.php?page=<?= $page ?>&cate_id=<?= $cate_id ?>&pages=<?= $i; ?>"><?php echo $i; ?></a>
      </li>
    <?php } ?>
    <li style="<?php if ($pages >= $count) {
      echo 'display: none;';
    } ?>">
    <a href="<?php if ($pages >= $count) {
      echo "";
      } else {
        echo "index.php?page=" . $page . "&cate_id=" . $cate_id . "&pages=" . $next;
      } ?>">&raquo;</a>
    </li>
  </ul>
</div>
</div>
</div>
<?php } else {
  $count = ceil($countAllProduct['countAll'] / $limit);
  if (isset($_GET['pages']) && !empty($_GET['pages']) && is_numeric($_GET['pages'])) {
    $pages = $_GET['pages'];
  } ?>
  <div class="toolbar">
   <div class="pager">
     <div id="limiter">
       <label>View: </label>
       <ul>
         <li><a href="#">15<span class="right-arrow"></span></a>
           <ul>
             <li><a href="#">20</a></li>
             <li><a href="#">30</a></li>
             <li><a href="#">35</a></li>
           </ul>
         </li>
       </ul>
     </div>
     <div class="pages">
       <label style="line-height: 3;">Page:</label>
       <ul class="pagination">
         <li style="<?php if ($pages <= 1) {
          echo 'display: none;';
        } ?>">
        <a href="<?php if ($pages <= 1) {
          echo "";
          } else {
            echo "index.php?page=men&pages=" . $prev;
          } ?>">&laquo;</a>
        </li>
        <?php for ($i = $start; $i <= $end; $i++) { ?>
         <li class="<?php if ($pages == $i) {
          echo "active";
        } ?>">
        <a href="index.php?page=men&pages=<?= $i; ?>"><?php echo $i; ?></a>
      </li>
    <?php } ?>
    <li style="<?php if ($pages >= $count) {
      echo 'display: none;';
    } ?>">
    <a href="<?php if ($pages >= $count) {
      echo "";
      } else {
        echo "index.php?page=men&pages=" . $next;
      } ?>">&raquo;</a>
    </li>
  </ul>
</div>
</div>
</div>
<?php } ?>
</div>
</article>
<!--	///*///======    End article  ========= //*/// -->
</div>
<div class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9">
 <aside class="col-left sidebar">
   <div class="side-nav-categories">
     <div class="block-title"> Categories </div>
     <!--block-title-->
     <!-- BEGIN BOX-CATEGORY -->
     <div class="box-content box-category">
       <ul>
         <li> <a class="active" href="grid.html">Women</a> <span class="subDropdown minus"></span>
           <ul class="level0_415" style="display:block">
             <li> <a href="grid.html"> Tops </a> <span class="subDropdown plus"></span>
               <ul class="level1" style="display:none">
                 <li> <a href="grid.html"> Evening Tops </a> </li>
                 <li> <a href="grid.html"> Shirts &amp; Blouses </a> </li>
                 <li> <a href="grid.html"> Tunics </a> </li>
                 <li> <a href="grid.html"> Vests </a> </li>
                 <!--end for-each -->
               </ul>
               <!--level1-->
             </li>
             <!--level1-->
             <li> <a href="grid.html"> Bags </a> <span class="subDropdown plus"></span>
               <ul class="level1" style="display:none">
                 <li> <a href="grid.html"> Bags </a> </li>
                 <li> <a href="grid.html"> Designer Handbags </a> </li>
                 <li> <a href="grid.html"> Purses </a> </li>
                 <li> <a href="grid.html"> Shoulder Bags </a> </li>
                 <!--end for-each -->
               </ul>
               <!--level1-->
             </li>
             <!--level1-->
             <li> <a href="grid.html"> Shoes </a> <span class="subDropdown plus"></span>
               <ul class="level1" style="display:none">
                 <li> <a href="grid.html"> Flat Shoes </a> </li>
                 <li> <a href="grid.html"> Flat Sandals </a> </li>
                 <li> <a href="grid.html"> Boots </a> </li>
                 <li> <a href="grid.html"> Heels </a> </li>
                 <!--end for-each -->
               </ul>
               <!--level1-->
             </li>
             <!--level1-->
             <li> <a href="grid.html"> Jewellery </a>
               <ul class="level1" style="display:none">
                 <li> <a href="grid.html"> Bracelets </a> </li>
                 <li> <a href="grid.html"> Necklaces &amp; Pendants </a> </li>
                 <li> <a href="grid.html"> Pins &amp; Brooches </a> </li>
                 <!--end for-each -->
               </ul>
               <!--level1-->
             </li>
             <!--level1-->
             <li> <a href="grid.html"> Dresses </a> <span class="subDropdown plus"></span>
               <ul class="level1" style="display:none">
                 <li> <a href="grid.html"> Casual Dresses </a> </li>
                 <li> <a href="grid.html"> Evening </a> </li>
                 <li> <a href="grid.html"> Designer </a> </li>
                 <li> <a href="grid.html"> Party </a> </li>
                 <!--end for-each -->
               </ul>
               <!--level1-->
             </li>
             <!--level1-->
             <li> <a href="grid.html"> Lingerie </a> <span class="subDropdown plus"></span>
               <ul class="level1" style="display:none">
                 <li> <a href="grid.html"> Bras </a> </li>
                 <li> <a href="grid.html"> Bodies </a> </li>
                 <li> <a href="grid.html"> Lingerie Sets </a> </li>
                 <li> <a href="grid.html"> Shapewear </a> </li>
                 <!--end for-each -->
               </ul>
               <!--level1-->
             </li>
             <!--level1-->
             <li> <a href="grid.html"> Jackets </a> <span class="subDropdown plus"></span>
               <ul class="level1" style="display:none">
                 <li> <a href="grid.html"> Coats </a> </li>
                 <li> <a href="grid.html"> Jackets </a> </li>
                 <li> <a href="grid.html"> Leather Jackets </a> </li>
                 <li> <a href="grid.html"> Blazers </a> </li>
                 <!--end for-each -->
               </ul>
               <!--level1-->
             </li>
             <!--level1-->
             <li> <a href="grid.html"> Swimwear </a> <span class="subDropdown plus"></span>
               <ul class="level1" style="display:none">
                 <li> <a href="grid.html"> Swimsuits </a> </li>
                 <li> <a href="grid.html"> Beach Clothing </a> </li>
                 <li> <a href="grid.html"> Bikinis </a> </li>
                 <!--end for-each -->
               </ul>
               <!--level1-->
             </li>
             <!--level1-->
           </ul>
           <!--level0-->
         </li>
         <!--level 0-->
         <li> <a href="grid.html">Men</a> <span class="subDropdown plus"></span>
           <ul class="level0_455" style="display:none">
             <li> <a href="grid.html"> Shoes </a> <span class="subDropdown plus"></span>
               <ul class="level1" style="display:none">
                 <li> <a href="grid.html"> Flat Shoes </a> </li>
                 <li> <a href="grid.html"> Boots </a> </li>
                 <li> <a href="grid.html"> Heels </a> </li>
                 <!--end for-each -->
               </ul>
               <!--level1-->
             </li>
             <!--level1-->
             <li> <a href="grid.html"> Jewellery </a> <span class="subDropdown plus"></span>
               <ul class="level1" style="display:none">
                 <li> <a href="grid.html"> Bracelets </a> </li>
                 <li> <a href="grid.html"> Necklaces &amp; Pendants </a> </li>
                 <li> <a href="grid.html"> Pins &amp; Brooches </a> </li>
                 <!--end for-each -->
               </ul>
               <!--level1-->
             </li>
             <!--level1-->
             <li> <a href="grid.html"> Dresses </a> <span class="subDropdown plus"></span>
               <ul class="level1" style="display:none">
                 <li> <a href="grid.html"> Casual Dresses </a> </li>
                 <li> <a href="grid.html"> Evening </a> </li>
                 <li> <a href="grid.html"> Designer </a> </li>
                 <li> <a href="grid.html"> Party </a> </li>
                 <!--end for-each -->
               </ul>
               <!--level1-->
             </li>
             <!--level1-->
             <li> <a href="grid.html"> Jackets </a> <span class="subDropdown plus"></span>
               <ul class="level1" style="display:none">
                 <li> <a href="grid.html"> Coats </a> </li>
                 <li> <a href="grid.html"> Jackets </a> </li>
                 <li> <a href="grid.html"> Leather Jackets </a> </li>
                 <li> <a href="grid.html"> Blazers </a> </li>
                 <!--end for-each -->
               </ul>
               <!--level1-->
             </li>
             <!--level1-->
             <li> <a href="grid.html"> Swimwear </a> <span class="subDropdown plus"></span>
               <ul class="level1" style="display:none">
                 <li> <a href="grid.html"> Swimsuits </a> </li>
                 <li> <a href="grid.html"> Beach Clothing </a> </li>
                 <!--end for-each -->
               </ul>
               <!--level1-->
             </li>
             <!--level1-->
           </ul>
           <!--level0-->
         </li>
         <!--level 0-->
         <li> <a href="grid.html">Electronics</a> <span class="subDropdown plus"></span>
           <ul class="level0_482" style="display:none">
             <li> <a href="grid.html"> Smartphones </a> <span class="subDropdown plus"></span>
               <ul class="level1" style="display:none">
                 <li> <a href="grid.html"> Samsung </a> </li>
                 <li> <a href="grid.html"> Apple </a> </li>
                 <li> <a href="grid.html"> Blackberry </a> </li>
                 <li> <a href="grid.html"> Nokia </a> </li>
                 <li> <a href="grid.html"> HTC </a> </li>
                 <!--end for-each -->
               </ul>
               <!--level1-->
             </li>
             <!--level1-->
             <li> <a href="grid.html"> Cameras </a> <span class="subDropdown plus"></span>
               <ul class="level1" style="display:none">
                 <li> <a href="grid.html"> Digital Cameras </a> </li>
                 <li> <a href="grid.html"> Camcorders </a> </li>
                 <li> <a href="grid.html"> Lenses </a> </li>
                 <li> <a href="grid.html"> Filters </a> </li>
                 <li> <a href="grid.html"> Tripod </a> </li>
                 <!--end for-each -->
               </ul>
               <!--level1-->
             </li>
             <!--level1-->
             <li> <a href="grid.html"> Accesories </a> <span class="subDropdown plus"></span>
               <ul class="level1" style="display:none">
                 <li> <a href="grid.html"> HeadSets </a> </li>
                 <li> <a href="grid.html"> Batteries </a> </li>
                 <li> <a href="grid.html"> Screen Protectors </a> </li>
                 <li> <a href="grid.html"> Memory Cards </a> </li>
                 <li> <a href="grid.html"> Cases </a> </li>
                 <!--end for-each -->
               </ul>
               <!--level1-->
             </li>
             <!--level1-->
           </ul>
           <!--level0-->
         </li>
         <!--level 0-->
         <li> <a href="grid.html">Digital</a> </li>
         <!--level 0-->
         <li class="last"> <a href="grid.html">Fashion</a> </li>
         <!--level 0-->
       </ul>
     </div>
     <!--box-content box-category-->
   </div>
   <div class="block block-layered-nav">
     <div class="block-title"> Browse By </div>
     <div class="block-content">
       <dl id="narrow-by-list2">
         <dt class="last odd">Category</dt>
         <dd class="last odd">
           <ol>
             <li> <a href="grid.html">Stylish Bag</a> (30) </li>
             <li> <a href="grid.html">Material Bag</a> (30) </li>
             <li> <a href="grid.html">Shoes</a> (32) </li>
             <li> <a href="grid.html">Jwellery</a> (30) </li>
             <li> <a href="grid.html">Dresses</a> (30) </li>
             <li> <a href="grid.html">Swimwear</a> (30) </li>
           </ol>
         </dd>
       </dl>
     </div>
   </div>

   <div class="block block-layered-nav">
     <div class="block-title">Shop By</div>
     <div class="block-content">
       <p class="block-subtitle">Shopping Options</p>
       <dl id="narrow-by-list">
         <dt class="odd">Price</dt>
         <dd class="odd">
           <ol>
             <li> <a href="#"><span class="price">$0.00</span> - <span class="price">$99.99</span></a> (6) </li>
             <li> <a href="#"><span class="price">$100.00</span> and above</a> (6) </li>
           </ol>
         </dd>
         <dt class="even">Manufacturer</dt>
         <dd class="even">
           <ol>
             <li> <a href="#">TheBrand</a> (9) </li>
             <li> <a href="#">Company</a> (4) </li>
             <li> <a href="#">LogoFashion</a> (1) </li>
           </ol>
         </dd>
         <dt class="odd">Color</dt>
         <dd class="odd">
           <ol>
             <li> <a href="#">Green</a> (1) </li>
             <li> <a href="#">White</a> (5) </li>
             <li> <a href="#">Black</a> (5) </li>
             <li> <a href="#">Gray</a> (4) </li>
             <li> <a href="#">Dark Gray</a> (3) </li>
             <li> <a href="#">Blue</a> (1) </li>
           </ol>
         </dd>
         <dt class="last even">Size</dt>
         <dd class="last even">
           <ol>
             <li> <a href="#">S</a> (6) </li>
             <li> <a href="#">M</a> (6) </li>
             <li> <a href="#">L</a> (4) </li>
             <li> <a href="#">XL</a> (4) </li>
           </ol>
         </dd>
       </dl>
     </div>
   </div>
   <div class="block block-banner"><a href="#"><img alt="block-banner" src="assets/images/RHS-banner-img.jpg"></a></div>
   <div class="block block-cart">
     <div class="block-title ">My Cart</div>
     <div class="block-content">
       <div class="summary">
         <p class="amount">There are <a href="#">2 items</a> in your cart.</p>
         <p class="subtotal"> <span class="label">Cart Subtotal:</span> <span class="price">$27.99</span> </p>
       </div>
       <div class="ajax-checkout">
         <button class="button button-checkout" title="Submit" type="submit"><span>Checkout</span></button>
       </div>
       <p class="block-subtitle">Recently added item(s) </p>
       <ul>
         <li class="item"> <a href="product_detail.html" title="Sample Product" class="product-image"><img src="assets/products-images/product1.jpg" alt="Sample Product"></a>
           <div class="product-details">
             <div class="access"> <a href="#" title="Remove This Item" class="btn-remove1"> <span class="icon"></span> Remove </a> </div>
             <p class="product-name"> <a href="product_detail.html">Sample Product</a> </p>
             <strong>1</strong> x <span class="price">$19.99</span>
           </div>
         </li>
         <li class="item last"> <a href="product_detail.html" title="Sample Product" class="product-image"><img src="assets/products-images/product2.jpg" alt="Sample Product"></a>
           <div class="product-details">
             <div class="access"> <a href="#" title="Remove This Item" class="btn-remove1"> <span class="icon"></span> Remove </a> </div>
             <p class="product-name"> <a href="product_detail.html">Sample Product</a> </p>
             <strong>1</strong> x <span class="price">$8.00</span>
             <!--access clearfix-->
           </div>
         </li>
       </ul>
     </div>
   </div>

   <!-- Special Slider -->
   <section class="special-pro">
     <div class="slider-items-products">
       <div class="block-title">
         <h2>Special Products</h2>
       </div>
       <div id="special-slider" class="product-flexslider hidden-buttons">
         <div class="slider-items slider-width-col4 products-grid">

           <!-- Item -->
           <div class="item">
             <div class="item-inner">
               <div class="item-img">
                 <div class="item-img-info"> <a class="product-image" title="Sample Product" href="product_detail.html"> <img alt="Sample Product" src="assets/products-images/product11.jpg"></a>
                   <div class="item-box-hover">
                     <div class="box-inner">
                       <div class="actions">
                         <div class="add_cart">
                           <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                         </div>
                         <div class="product-detail-bnt"><a href="quick_view.html" class="button detail-bnt"><span>Quick View</span></a></div> <span class="add-to-links"><a class="link-wishlist" product_id="<?= $value['id'] ?>" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a>
                         <a href="compare.html" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="item-info">
                 <div class="info-inner">
                   <div class="item-title"> <a title="Sample Product" href="product_detail.html"> Sample Product </a> </div>
                   <div class="item-content">
                     <div class="rating">
                       <div class="ratings">
                         <div class="rating-box">
                           <div style="width:30%" class="rating"></div>
                         </div>
                         <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                       </div>
                     </div>
                     <div class="item-price">
                       <div class="price-box">
                         <p class="old-price"> <span class="price-label">Regular Price:</span> <span id="old-price-2" class="price"> $567.00 </span> </p>
                         <p class="special-price"> <span class="price-label">Special Price</span> <span id="product-price-2" class="price"> $456.00 </span> </p>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <!-- End Item -->

           <!-- Item -->
           <div class="item">
             <div class="item-inner">
               <div class="item-img">
                 <div class="item-img-info"> <a class="product-image" title="Stablished fact reader" href="#"> <img alt="Stablished fact reader" src="products-images/product12.jpg"></a>
                   <div class="item-box-hover">
                     <div class="box-inner">
                       <div class="actions">
                         <div class="add_cart">
                           <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                         </div>
                         <div class="product-detail-bnt"><a href="quick_view.html" class="button detail-bnt"><span>Quick View</span></a></div> <span class="add-to-links"><a href="wishlist.html" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a>
                         <a href="compare.html" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="item-info">
                 <div class="info-inner">
                   <div class="item-title"> <a title="Stablished fact reader" href="#">Sample Product</a> </div>
                   <div class="item-content">
                     <div class="rating">
                       <div class="ratings">
                         <div class="rating-box">
                           <div style="width:100%" class="rating"></div>
                         </div>
                         <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                       </div>
                     </div>
                     <div class="item-price">
                       <div class="price-box">
                         <p class="old-price"> <span class="price-label">Regular Price:</span> <span id="old-price-27" class="price"> $100.00 </span> </p>
                         <p class="special-price"> <span class="price-label">Special Price</span> <span id="product-price-27" class="price"> $90.00 </span> </p>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <!-- End Item -->

           <div class="item">
             <div class="item-inner">
               <div class="item-img">
                 <div class="item-img-info"> <a class="product-image" title="Sample Product" href="product_detail.html"> <img alt="Sample Product" src="products-images/product13.jpg"> </a>
                   <div class="new-label new-top-left">new</div>
                   <div class="item-box-hover">
                     <div class="box-inner">
                       <div class="actions">
                         <div class="add_cart">
                           <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                         </div>
                         <div class="product-detail-bnt"><a href="quick_view.html" class="button detail-bnt"><span>Quick View</span></a></div> <span class="add-to-links"><a href="wishlist.html" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a>
                         <a href="compare.html" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="item-info">
                 <div class="info-inner">
                   <div class="item-title"> <a title="Sample Product" href="product_detail.html"> Sample Product </a> </div>
                   <div class="item-content">
                     <div class="rating">
                       <div class="ratings">
                         <div class="rating-box">
                           <div style="width:80%" class="rating"></div>
                         </div>
                         <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                       </div>
                     </div>
                     <div class="item-price">
                       <div class="price-box"> <span id="product-price-1" class="regular-price"> <span class="price">$125.00</span> </span> </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>



         </div>
       </div>
     </div>
   </section>
   <!-- End Featured Slider -->

   <div class="block block-compare">
     <div class="block-title ">Compare Products (2)</div>
     <div class="block-content">
       <ol id="compare-items">
         <li class="item odd">
           <input type="hidden" value="2173" class="compare-item-id">
           <a class="btn-remove1" title="Remove This Item" href="#"></a> <a href="#" class="product-name"> Sofa with Box-Edge Polyester Wrapped Cushions</a>
         </li>
         <li class="item last even">
           <input type="hidden" value="2174" class="compare-item-id">
           <a class="btn-remove1" title="Remove This Item" href="#"></a> <a href="#" class="product-name"> Sofa with Box-Edge Down-Blend Wrapped Cushions</a>
         </li>
       </ol>
       <div class="ajax-checkout">
         <button type="submit" title="Submit" class="button button-compare"><span>Compare</span></button>
         <button type="submit" title="Submit" class="button button-clear"><span>Clear</span></button>
       </div>
     </div>
   </div>
   <div class="block block-list block-viewed">
     <div class="block-title"> Recently Viewed </div>
     <div class="block-content">
       <ol id="recently-viewed-items">
         <li class="item odd">
           <p class="product-name"><a href="#"> Armchair with Box-Edge Upholstered Arm</a></p>
         </li>
         <li class="item even">
           <p class="product-name"><a href="#"> Pearce Upholstered Slee pere</a></p>
         </li>
         <li class="item last odd">
           <p class="product-name"><a href="#"> Sofa with Box-Edge Down-Blend Wrapped Cushions</a></p>
         </li>
       </ol>
     </div>
   </div>
   <div class="block block-poll">
     <div class="block-title">Community Poll </div>
     <form id="pollForm" action="#" method="post" onSubmit="return validatePollAnswerIsSelected();">
       <div class="block-content">
         <p class="block-subtitle">What is your favorite Magento feature?</p>
         <ul id="poll-answers">
           <li class="odd">
             <input type="radio" name="vote" class="radio poll_vote" id="vote_5" value="5">
             <span class="label">
               <label for="vote_5">Layered Navigation</label>
             </span>
           </li>
           <li class="even">
             <input type="radio" name="vote" class="radio poll_vote" id="vote_6" value="6">
             <span class="label">
               <label for="vote_6">Price Rules</label>
             </span>
           </li>
           <li class="odd">
             <input type="radio" name="vote" class="radio poll_vote" id="vote_7" value="7">
             <span class="label">
               <label for="vote_7">Category Management</label>
             </span>
           </li>
           <li class="last even">
             <input type="radio" name="vote" class="radio poll_vote" id="vote_8" value="8">
             <span class="label">
               <label for="vote_8">Compare Products</label>
             </span>
           </li>
         </ul>
         <div class="actions">
           <button type="submit" title="Vote" class="button button-vote"><span>Vote</span></button>
         </div>
       </div>
     </form>
   </div>
   <div class="block block-tags">
     <div class="block-title"> Popular Tags</div>
     <div class="block-content">
       <ul class="tags-list">
         <li><a href="#" style="font-size:98.3333333333%;">Camera</a></li>
         <li><a href="#" style="font-size:86.6666666667%;">Hohoho</a></li>
         <li><a href="#" style="font-size:145%;">SEXY</a></li>
         <li><a href="#" style="font-size:75%;">Tag</a></li>
         <li><a href="#" style="font-size:110%;">Test</a></li>
         <li><a href="#" style="font-size:86.6666666667%;">bones</a></li>
         <li><a href="#" style="font-size:110%;">cool</a></li>
         <li><a href="#" style="font-size:86.6666666667%;">cool t-shirt</a></li>
         <li><a href="#" style="font-size:86.6666666667%;">crap</a></li>
         <li><a href="#" style="font-size:86.6666666667%;">good</a></li>
         <li><a href="#" style="font-size:86.6666666667%;">green</a></li>
         <li><a href="#" style="font-size:86.6666666667%;">hip</a></li>
         <li><a href="#" style="font-size:75%;">laptop</a></li>
         <li><a href="#" style="font-size:75%;">mobile</a></li>
         <li><a href="#" style="font-size:75%;">nice</a></li>
         <li><a href="#" style="font-size:86.6666666667%;">phone</a></li>
         <li><a href="#" style="font-size:98.3333333333%;">red</a></li>
         <li><a href="#" style="font-size:86.6666666667%;">tight</a></li>
         <li><a href="#" style="font-size:75%;">trendy</a></li>
         <li><a href="#" style="font-size:86.6666666667%;">young</a></li>
       </ul>
       <div class="actions"> <a href="#" class="view-all">View All Tags</a> </div>
     </div>
   </div>
 </aside>
</div>
</div>
</div>
</section>
<!-- Main Container End -->
<div class="top-banner-section wow bounceInUp animated">
 <div class="container">
   <div class="row">
     <div class="col-lg-3 col-sm-3 col-xs-6">
       <div class="col add-banner1">
         <div class="top-b-text"><strong>Designer Shoes</strong> For Women</div>
       </div>
     </div>
     <div class="col-lg-3 col-sm-3 col-xs-6">
       <div class="col free-shipping"><strong>Free Shipping</strong> on order over $199</div>
     </div>
     <div class="col-lg-3 col-sm-3 col-xs-6">
       <div class="col add-banner2">
         <div class="top-b-text"><strong>Luxury Handbags</strong>2015 New Arrive</div>
       </div>



     </div>
     <div class="col-lg-3 col-sm-3 col-xs-6">
       <div class="col last offer"><strong>New Collection</strong> Lorem ipsum dolor.</div>
     </div>
   </div>
 </div>
</div>
   <!-- end banner section -->