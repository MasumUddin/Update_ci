 <h2>Book List</h2>
			<hr/>
       <?php
            $msg = $this->session->flashdata('msg');
      
            if (isset($msg)) {
                echo $msg ;
                }
             ?>
<table class="table">
  <thead>
    <tr>
      <th>No.</th>
      <th>BookName</th>
      <th>Dep</th>
      <th>Author</th>
      <th style="width: 3.5em;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 0;
    foreach ($allbook as $bdata) {
      $i++;

    ?>
    <tr>
      <td><?php echo$i;?></td>
      <td><?php echo $bdata->bookname;?></td>
      <td>
      <?php
      $sdepid = $bdata->dep;
      $getdep = $this->dep_model->getDepartment($sdepid);
      if (isset($getdep)) {

        echo $getdep->depname;
       
      }

      ?>
      </td>
       <td><?php echo $bdata->author;?></td>
      
      <td>
          <a href="<?php echo base_url();?>book/editbook/<?php echo $bdata->bookid;?>"><i class="fa fa-pencil"></i></a>
          <a onclick="return confirm('Are you ready to remove this?');" href="<?php echo base_url();?>book/delbook/<?php echo $bdata->bookid;?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
      </td>
    </tr>
  <?php }?>
    
  </tbody>
</table>
