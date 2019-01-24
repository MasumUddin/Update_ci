 
    <script src="<?php echo base_url();?>lib/jquery.dataTables.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>lib/jquery.dataTables.css"/>

 <h2>Issue List</h2>
			<hr/>
       <?php
            $msg = $this->session->flashdata('msg');
      
            if (isset($msg)) {
                echo $msg ;
                }
             ?>
<table class="display" id="delowar">
  <thead>
    <tr>
      <th>No.</th>
      <th>Student Name</th>
      <th>Dep</th>
      <th>Reg No</th>
      <th>Book Name</th>
      <th>Issue Date</th>
      <th>Action</th>

    </tr>
  </thead>
  <tbody>
     <?php
    $i = 0;
    foreach ($issuedata as $idata) {
      $i++;

    ?>

    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $idata->studentname; ?></td>
      <td>
        <?php
      $sdepid = $idata->dep;
      $getdep = $this->dep_model->getDepartment($sdepid);
      if (isset($getdep)) {

        echo $getdep->depname;
       
      }

      ?>

         </td>
      <td><?php echo $idata->reg; ?></td>
      <td>
      <?php
      $bookid = $idata->book;
      $getbook = $this->book_model->bookByID($bookid);
      if (isset($getbook)) { echo $getbook->bookname;}
      ?>
          

        </td>

      <td><?php echo date("d/m/Y h:ia", strtotime($idata->date)); ?></td>

      <td><?php echo $idata->studentname; ?></td>
      <td><a onclick="return confirm('Are you ready to remove this?');" href="<?php echo base_url();?>manage/dellist/<?php echo $idata->id;?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a></td>
      
    </tr>
  <?php } ?>

  </tbody>
</table>
<script>
    $(document).ready(function(){
      $("#delowar").DataTable();
       

    });           
 </script>