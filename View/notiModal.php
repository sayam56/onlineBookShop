
    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div id="animation">
                <div class="modal-header">
                    <span class="close">&times;</span>

                </div>
                <div class="modal-body">
                    <H4>The following orders have been approved:</H4>

                    <br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="demo-box m-t-20">

                                <div class="table-responsive">
                                    <table class="table m-0 table-colored-bordered table-bordered-primary" style="padding: 10px;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>Purchased Qty</th>
                                                <th>Ind. Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            try {
                                                $sql = "SELECT * FROM `notifications` WHERE user_id='" . $user_id . "' AND seen='0' ";
                                                $object = $conn->query($sql);
                                                $notiTab = $object->fetchAll();
                                                $count = 1;
                                                foreach ($notiTab as $notiRow) {
                                                    //notiRow[3] has product ID

                                                    $prdcsql = "SELECT product_name FROM `product` WHERE id='" . $notiRow[3] . "'";
                                                    $prdcobj = $conn->query($prdcsql);
                                                    $prdTab = $prdcobj->fetchAll();
                                                    foreach ($prdTab as $prdName) {
                                            ?>
                                                        <tr>
                                                            <td><?php echo $count; ?></td>
                                                            <td><?php echo $prdName[0]; ?></td>
                                                            <td><?php echo $notiRow[4]; ?>pcs</td>
                                                            <td><?php echo $notiRow[5]; ?></td>
                                                        </tr>

                                            <?php

                                                    }


                                                    $count++;
                                                }
                                            } catch (PDOException $ee) {
                                                echo $ee;
                                            }

                                            ?>

                                        </tbody>
                                    </table>
                                </div><!-- table responsive -->
                            </div><!-- demo box -->
                        </div><!-- col md -->
                    </div><!-- row -->
                    <br><br>

                    <h3 style="text-align:center; color: red; margin-bottom:15px;"> Thank You <h3>

                </div>

            </div><!-- animation -->
        </div>

    </div> <!-- mymodal ends -->