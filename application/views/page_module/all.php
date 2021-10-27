<div class="page-wrapper">
    <?php $this->load->view('admin/include/breadcrumb'); ?>
    <section class="page-content container-fluid pt-4 mb-4">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <a href="<?= base_url('admin/pages/create')?>" class="btn btn-primary"> <i class="fas fa-file"></i> New Page &plus; </a>
                <div class="mt-4 card card-body">
                    <table class="table table-striped mt-5 p-4 rounded" id="ditable">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Title</th>
                                <th>Link</th>
                                <th>Location</th>
                                <th>Manage</th>
                                <!-- <th>Role</th>
                                
                                <th>Manage</th> -->
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach( $pages as $key => $pg) {  ?>
                                <tr> 
                                    <td> <?= ++$key ?> </td> 
                                    <td><?= $pg->title ?></td>  
                                    <td> <?= $pg->link ?> </td> 
                                    <td><?= mb_convert_case($pg->location, MB_CASE_TITLE) ?>'s Dashboard </td>                                      
                                    <td>
                                        <?php 
                                            if (strlen ($pg->link) > 6) { 
                                            echo "<a href='$pg->link' target='_blank'  class='text-info'><i class='fas fa-eye'></i> </a> &emsp;"; 
                                            }
                                            else{
                                                echo "<a href='$view_link$pg->id' target='_blank' class='text-info'><i class='fas fa-eye'></i> </a> &emsp;";
                                            }
                                        ?>
                                        <a href="<?= base_url('admin/pages/modify/').$pg->id;?>" class="text-success"> <i class="fas fa-edit"></i></a> &emsp;
                                        <a class="text-danger" href="<?= base_url('admin/pages/remove/').$pg->id;?>" ><i class="fas fa-trash"></i> </a>
                                    </td> 
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
