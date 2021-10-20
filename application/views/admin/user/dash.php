<div class="page-wrapper">
 
    <div class="page-content pt-4 mb-4">

    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
			    <div class="col">
						<div class="card radius-10 overflow-hidden">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Total <?php echo trans('appointments') ?></p>
										<h5 class="mb-0"><?php echo get_count_by_user('appointments') ?></h5>
									</div>
									<div class="ms-auto"><i class='fas fa-sticky-note font-30'></i>
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
										<p class="mb-0">Total <?php echo trans('staffs') ?></p>
										<h5 class="mb-0"><?php echo get_count_by_user('staffs') ?></h5>
									</div>
									<div class="ms-auto"> <i class='bx bx-group font-30'></i>
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
										<p class="mb-0">Total <?php echo trans('services') ?> </p>
										<h5 class="mb-0"><?php echo get_count_by_user('services') ?></h5>
									</div>
									<div class="ms-auto">	<i class='fas fa-tags font-30'></i>
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
										<h5 class="mb-0"><?php echo get_count_by_user('customers') ?></h5>
									</div>
									<div class="ms-auto">	<i class='bx bx-group font-30'></i>
									</div>
								</div>
							</div>
							<div class="" id="chart4"></div>
						</div>
					</div>
			  </div> 

        <div class="row">
          <div class="col-lg-12">
            <div class="card" >
              <div class="card-header bg-primary text-white">
                <h5 class="mb-0 text-white"><?php echo trans('last-12-months-income') ?></h5>
              </div>
              
              <div class="card-body">
                <div id="userIncomeChart"></div>
              </div>
            </div>

            <?php if (!empty($appointments)): ?>
              <div class="card" data-aos="fade-up">
                <div class="card-header">
                  <h5 class="mb-0"><?php echo trans('latest-appointments') ?></h5>
                </div>
                
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover table-valign-middle">
                    <thead>
                    <tr>
                      <th><?php echo trans('customer') ?></th>
                      <th><?php echo trans('service') ?></th>
                      <th><?php echo trans('time-date') ?></th>
                      <th><?php echo trans('created') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($appointments as $appointment): ?>
                        <tr>
                          <td>
                            <div class="d-flex">
                              <div class="mr-3">
                                <img class="img-circle mt-1" width="30px" src="<?php echo base_url($appointment->customer_thumb) ?>">
                              </div>
                              <div>
                                <p class="mb-0 font-weight-bold"><?php echo html_escape($appointment->customer_name) ?></p>
                                <p class="mb-0"><?php echo html_escape($appointment->customer_email) ?></p>
                              </div>
                            </div>
                          </td>

                          <td>
                              <p class="mb-0 font-weight-bold"><?php echo html_escape($appointment->service_name) ?></p>
                              <span class="small"><?php echo html_escape($this->business->currency_code) ?> <?php echo html_escape($appointment->price) ?></span>
                              <span class="small"><?php echo html_escape($appointment->duration) ?> min</span>
                          </td>


                          <td>
                              <p class="mb-1"><span class="badge-custom badge-secondary-soft mb-1"><i class="fas fa-calendar-alt"></i> <?php echo my_date_show($appointment->date) ?></span></p>
                              <p class="mb-0"><span class="badge-custom badge-secondary-soft"><i class="fas fa-clock"></i> <?php echo html_escape($appointment->time) ?></span></p>
                          </td>

                          <td>
                              <span class="small"><i class="far fa-clock"></i> <?php echo html_escape(get_time_ago($appointment->created_at)) ?></span>
                          </td>
                          
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>


              <div class="text-center mb-4">
                <a href="<?php echo base_url('admin/appointment') ?>" class="btn btn-secondary btn-xs"><?php echo trans('see-all') ?> <i class="lnib lni-arrow-right"></i></a>
              </div>
            <?php endif ?>
          </div>
          
        </div>
  
  </div>
