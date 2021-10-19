<div class="page-wrapper">
  <div class="page-content">

  <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
			    <div class="col">
						<div class="card radius-10 overflow-hidden">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Total <?php echo trans('users') ?></p>
										<h5 class="mb-0"><?php echo get_count('users') - 1; ?></h5>
									</div>
									<div class="ms-auto">	<i class='bx bx-group font-30'></i>
									</div>
								</div>
							</div>
							<div class="" id="chart1"></div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 overflow-hidden">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Total <?php echo trans('services') ?></p>
										<h5 class="mb-0"><?php echo get_count('services') ?></h5>
									</div>
									<div class="ms-auto">	<i class='fas fa-tags font-30'></i>
									</div>
								</div>
							</div>
							<div class="" id="chart2"></div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 overflow-hidden">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Total <?php echo trans('appointments') ?> </p>
										<h5 class="mb-0"><?php echo get_count('appointments') ?></h5>
									</div>
									<div class="ms-auto">	<i class='fas fa-sticky-note font-30'></i>
									</div>
								</div>
							</div>
							<div class="" id="chart3"></div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 overflow-hidden">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Total <?php echo trans('customers') ?></p>
										<h5 class="mb-0"><?php echo get_count('customers') ?></h5>
									</div>
									<div class="ms-auto">	<i class='bx bx-group font-30'></i>
									</div>
								</div>
							</div>
							<div class="" id="chart4"></div>
						</div>
					</div>
			  </div> 
  </div>

  <div class="row mx-2">
			  <div class="col-12 col-xl-8 d-flex">
				  <div class="card radius-10 w-100">
            
						<div class="card-body">
            <h5 class="mb-0"><?php echo trans('last-12-months-income') ?></h5>
              <div id="adminIncomeChart"></div>
						</div>
            <?php if (count($users) > 5): ?>
              <div class="text-center mb-2">
                <a href="<?php echo base_url('admin/users') ?>" class="badge bg-secondary"><?php echo trans('see-all') ?></a>
              </div>
            <?php endif ?>
					</div>
				</div>

				<div class="col-12 col-xl-4 d-flex">
				  <div class="card radius-10 w-100">
						<div class="card-body">
							<div class="d-flex align-items-center">
									<div>
                  
                  <h5 class="m-0"><?php echo trans('packages-by-user') ?></h5>
									</div>
									<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
									</div>
								</div>
							<div class="mt-4" id="chart6"></div>
              <div id="packagePie"></div>
							<div class="d-flex align-items-center">

									<div class="ms-auto d-flex align-items-center border radius-10 px-2">
									  <i class='bx bxs-checkbox font-22 me-1 text-primary'></i><span>Marketing Sales</span>
									</div>
							  </div>
						</div>
					</div>
				</div>

	</div><!--end row-->

  <!-- latest user and net income -->
  <div class="row mx-2">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header bg-primary text-white">
        <?php echo trans('latest-users') ?>
        </div>

        <div class="card-body">
        <table class="table table-hover table-responsive">
                  <thead>
                  <tr>
                    <th><?php echo trans('user') ?></th>
                    <th><?php echo trans('plan') ?></th>
                    <th><?php echo trans('joining-date') ?></th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($users as $user): ?>
                      <tr>
                        <td>
                          <img src="<?php echo base_url($user->thumb); ?>" alt="user" width="50" class="rounded-circle img-fluid">
                          <?php echo html_escape($user->name) ?>
                        </td>
                        <td><span class="badge badge-primary-soft text-dark"><?php echo html_escape($user->package); ?></span></td>
                        <td>
                            <span class="small text-muted"><i class="fas fa-clock"></i> <?php echo get_time_ago($user->created_at) ?></span>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card">
        <div class="card-header bg-primary text-white"><?php echo trans('net-income') ?></div>
        <div class="card-body">
        <table class="table table-hover">
                  <thead>
                    <tr>
                      <th><?php echo trans('fiscal-year') ?> <i class="fa fa-info-circle" data-toggle="tooltip" data-title="<?php echo trans('fiscal-year-title') ?>"></i></th>
                      <?php foreach ($net_income as $netincome): ?>
                        <th><?php echo show_year($netincome->created_at) ?></th>
                      <?php endforeach ?>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo trans('income') ?></td>
                      <?php foreach ($net_income as $netincome): ?>
                        <td><span class="badge badge-success-soft text-dark"><?php echo settings()->currency_symbol ?> <?php echo html_escape(number_format($netincome->total,2)) ?></span></td>
                      <?php endforeach ?>
                    </tr>
                  </tbody>
                </table>
        </div>
      </div>
    </div>
  </div>
  </div>