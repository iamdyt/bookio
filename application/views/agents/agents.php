<div class="page-wrapper">
    <?php $this->load->view('admin/include/breadcrumb'); ?>
    <section class="page-content container-fluid pt-4 mb-4">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <a href="<?= base_url('admin/agents/create')?>" class="btn btn-primary"> <i class="fas fa-users"></i> New Agent &plus; </a>
                <div class="mt-4 card card-body">
                    <table class="table table-striped mt-5 p-4 rounded" id="ditable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Phone</th>
                                <th>E-mail</th>
                                <th>Role</th>
                                
                                <th>Manage</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach( $agents as $agent) {  ?>
                                <tr> <td> <?= $agent->name ?> </td> <td><?= $agent->user_name ?></td>  <td> <?= $agent->phone ?> </td>  <td><?= $agent->email ?></td> <td><?= $agent->role ?></td> <td><a href="<?= base_url('admin/agents/delete/').$agent->id;?>"  class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a></td></tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
