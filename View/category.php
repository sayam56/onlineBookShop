<div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Categories</h4>
                            <ul>
                                <?php
                                //getting the categories

                                try {
                                    $catsql = "SELECT * FROM categories ";
                                    $catObj = $conn->query($catsql);
                                    $catTab = $catObj->fetchAll();
                                    foreach ($catTab as $key) {
                                ?>
                                        <li onclick="selectCategory(<?php echo $key[0]?>)"><a href="#"><?php echo $key[1] ?></a></li>
                                <?php
                                    }
                                } catch (PDOException $e) {
                                    echo "<script>console.log('category fetch error');</script>";
                                }


                                ?>
                            </ul>

                        </div>
                    </div>
                </div>