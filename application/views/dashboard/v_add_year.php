<div class="right_col" role="main">

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<div class="x_panel">
				<!--<div class="x_title">
                    <h4 class="">Publikasi Jurnal</h4>
                    <div class="clearfix"></div>
                </div>-->
				<div class="x_content">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="x_title">
									<h2>Tahun</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<?php
                                        $atribut = array(
                                                'class' => 'form-horizontal form-label-left',
                                                'data-parsley-validate' => '',
                                                'id'=>'demo-form2'
                                        );                                        
                                        echo form_open_multipart('AddYear/savedok',$atribut);
                                    ?>
									<!--<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">-->
									
									<div class="form-group">
										<label class="control-label col-md-2 col-sm-2 col-xs-12">Tahun</label>
										<div class="col-md-4 col-sm-4 col-xs-12">
											<input id="tahun" name="tahun" type="number"
												class="form-control col-md-4 col-xs-12" type="text" required="required">
										</div>
									</div>
									<div class="ln_solid"></div>
									<div class="form-group">
										<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
											<button type="button" onclick="window.history.back()"
												class="btn btn-primary"><i class="fa fa-arrow-left"></i> Batal</button>
											<button class="btn btn-primary" type="reset">Reset</button>
											<button type="submit" class="btn btn-success" name="btnUpload"
												value="Upload">Submit</button>
										</div>
									</div>

									<?php
                                    echo form_close();
                                ?>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>