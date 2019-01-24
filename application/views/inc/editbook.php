            <h2>Update Book</h2>
            <hr/>
            <?php
            $msg = $this->session->flashdata('msg');
      
            if (isset($msg)) {
                echo $msg ;
                }
             ?>
        <div class="panel-body" style="width:600px;">
            <form action="<?php echo base_url();?>book/UpdateBookForm" method="post">
                 <input type="hidden" name="bookid" value="<?php echo $bookbyid->bookid ; ?>"class="form-control span12">
                <div class="form-group">
                    <label>Book Name</label>
                    <input type="text" name="bookname" value="<?php echo $bookbyid->bookname ; ?>" class="form-control span12">
                </div>
                 <div class="form-group">
                    <label>Department</label>
                   <select name= "dep" class="dep">
                        <option value="">Select One</option>
                        <?php
                        foreach ($departmentdata as $ddata) {
                            if ($bookbyid->dep == $ddata->depid)
                             { ?>
                                <option value="<?php echo $ddata->depid; ?>" selected="selected">
                                <?php echo $ddata->depname; ?>
                                </option>
                                <?php } ?>



                        <option value="<?php echo $ddata->depid; ?>">
                        <?php echo $ddata->depname; ?>
                            
                        </option>
                    <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Author</label>
                    <input type="text"  name="author" value="<?php echo $bookbyid->author ; ?>"  class="form-control span12">
                </div>
                <div class="form-group">
                <input type="submit"class="btn btn-primary" value="Submit"> 
                </div>
                
                   
            </form>
        </div>          