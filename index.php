<?php 

   require_once __DIR__."/autoload/autoload.php"; 
   $sqlHomecate = "SELECT name , id FROM category WHERE  home = 1  ORDER BY update_at";
$categoryHome = $db->fetchsql($sqlHomecate);

$data =[];

foreach ($categoryHome as $item) {
    $cateId = intval($item['id']);

    $sql = " SELECT * FROM product WHERE category_id = $cateId ";
    $productHome = $db->fetchsql($sql);
    $data[$item['name']] = $productHome;
}
?>
<?php require_once __DIR__."/layouts/header.php";?>
                    <div class="col-md-9 bor">
                        <section id="slide" class="text-center" >
                            <h3 style="
    font-weight: bold;
    padding: 5px 47px 5px 28px;
    font-size: 18px;
    border-bottom: 2px solid #000000;
    text-transform: uppercase;
    margin-top: 10px;
    margin-bottom: 10px;
    color: white;
    background: #ca0719;
    border-top-right-radius: 10px;">Shop Đồ Ăn Nhanh</h3>
                        </section>

                        <section class="box-main1">

                            <?php foreach ($data as $key => $value ):?>    
                <h3 class="title-main"><a href=""><?php echo $key ?> </a> </h3>
                        <div class="showitem">                   
                            <?php foreach ($value as $item):?>
                                <div class="col-md-3 item-product bor">
                                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                <img src="<?php echo uploads() ?>/product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="180">
                                    </a>
                                    <div class="info-item">
                                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                                        <p><strike class="sale"><?php echo formatPrice($item['price']) ?></strike> <b class="price"><?php echo formatpricesale($item['price'],$item['sale']) ?></b></p>
                                    </div>
                <div class="hidenitem">
                    <p><a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
                    <p><a href=""><i class="fa fa-heart"></i></a></p>
                    <p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                                    </div>
                                </div> 
                            <?php endforeach ?>
                        </div>
                            <?php endforeach ?>
                            
                        </section>
                    </div>
                    
                    
              
<?php require_once __DIR__."/layouts/footer.php"; ?>
               