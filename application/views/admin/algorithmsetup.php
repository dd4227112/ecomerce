<?php include('admin_header.php');?>
<!-- content -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><u>Algorithm Setup</u></h4>
                        <br>
                        <br>
                        <br>
                        <table class="table  table-hover">
                        <thead>
                            <tr class="bg-gradient-primary">
                            <th>Support </th>
                            <th>Confidence </th>
                            <th> Scan Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no =1;
                             if (!empty($setups)) {
                                foreach ($setups as $key => $setup) {?>
                            <tr>
                            <td> <?=$setup->support?> </td>
                            <td> <?=$setup->confidence ?></td>
                            <td> <?=$setup->scan?></td>
                            </tr>
                            <?php 
                            $no++;
                                }
                            }
                            else {
                                
                                echo "<tr><td  colspan ='4' class='text-center'>No data found</td></tr>";}

                            ?>
                        </tbody>
                        </table>
                    </div>
                    </div>
              </div>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Set Algorithm Parameters</h4>
                    <!-- <p class="card-description"> Basic form elements </p> -->
                    <form action="" class="forms-sample" method="POST">
                      <div class="form-group">
                        <label for="Support">Support</label>
                        <input type="number" required name ="support" class="form-control" id="Support" placeholder="Support value">
                      </div>
                      <div class="form-group">
                        <label for="confidence">Confidence</label>
                        <input type="number" required class="form-control" name="confidence" id="confidence" placeholder="confidence value do not include percentage sign">
                      </div>
                      <div class="form-group">
                        <label for="scan">Scan Count</label>
                        <input type="number" required class="form-control" name="scan" id="scan" placeholder="Scan Count">
                      </div>
                      <div class="form-group">
                        <label for="scan">Dicount Percentage</label>
                        <input type="number" required class="form-control" name="discount_percentage" id="discount_percentage" placeholder="set discount percentage do not include percentage sign ">
                      </div>
                      <button type="submit" class="btn btn-gradient-primary me-2">Save</button>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content -->

<!-- Edit modal -->

<?php include('admin_footer.php');?>
<script>

</script>
