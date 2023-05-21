<?php include('admin_header.php');?>
<!-- content -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><u>Sliders</u></h4>
                        <a href="" class="btn btn-sm btn-primary add_slider"> New 
                        </a>
                        <br>
                        <br>
                        <br>
                        <table class="table  table-hover">
                        <thead>
                            <tr class="bg-gradient-primary">
                            <th> # </th>
                            <th>Name </th>
                            <th> Description </th>
                            <th> Image </th>
                            <th>Display </th>
                            <th> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no =1;
                             if (!empty($sliders)) {
                                foreach ($sliders as $slider) {?>
                            <tr>
                            <td> <?=$no?> </td>
                            <td> <?=$slider->name?> </td>
                            <td> <?=$slider->short_description ?></td>
                            <td >
                                <img src="<?=base_url('web_files/img/'.$slider->image)?>" alt="image" />
                            </td>
                            <td> <?=$slider->display ?></td>

                            <td>  
                                <!-- <a href="#"  id="edit "title="Change image"><i class="mdi mdi-pen"></i></a>&nbsp;&nbsp;&nbsp;&nbsp; -->
                                <a href="#" id="<?=$slider->id?>" class="delete_slider" title="delete slider"><i class="mdi mdi-delete"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;

                            </td>
                            </tr>
                            <?php 
                            $no++;
                                }
                            }else {
                                echo "<tr><td  colspan ='5' class='text-center'>No data found</td></tr>";}

                            ?>
                        </tbody>
                        </table>
                    </div>
                    </div>
              </div>
        </div>
    </div>
</div>
<!-- content -->
<!-- add product modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add New Slider</h5>
        </div>
        <div class="modal-body">
          <p class="card-description">Select product to to add it to the slider</p>
                    <form class="forms-sample" action="addSlider" method="POST">
                      
                      <div class="form-group">
                        <label for="category_id" >Select.....</label>
                        <select name="product_id" required class="form-control" id="product_id">
                          <option></option>
                          <?php if (!empty($products)) {
                         foreach ($products as $key => $product) {?>
                          <option value="<?=$product->id?>"><?=$product->name?></option>
                          <?php }
                          }?>
                        </select>
                      </div>
                      <button class="btn btn-gradient-secondary  close">Cancel</button>
                      <button type="submit" class="btn btn-gradient-primary me-2">Save</button>
                    
                    </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Add product modal -->
<?php include('admin_footer.php');?>
<script>
    $(document).ready(function(){
        Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: "Make sure that one and only one slider have display column set to 'active'",
            footer: 'Otherwise all sliders could not work',
        });
    });
    $('.add_slider').on('click', function(e){
        e.preventDefault();
        $('#exampleModalCenter').modal("show");
      });
      $('.delete_slider').click(function(){
        var id = $(this).attr('id');
        window.location ="<?=base_url('Admin/deleteSlider')?>/"+id;
        });
</script>