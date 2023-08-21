<div class="modal" id="newsletterModal" tabindex="-1" role="dialog" aria-labelledby="newsletterModalTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document" style="max-width:800px">
			<div class="modal-content">
				<div class="modal-header d-flex justify-content-end">
					<button type="button" class="close align-self-end" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col">
							<div class="h2 text-center">
								ERHALTE EINEN 10% RABATTCODE
							</div>
							<div class="row">
								<div class="col-12 col-lg-6">
									<img class="img-fluid" src="/wp-content/uploads/2023/05/karoxa-1-600x880-1.jpg"/>
								</div>
								<div class="col-12 col-lg-6 d-flex flex-column justify-content-center mt-3 mg-lg-0">
									
									<div class="p text-uppercase fw-semibold d-flex pb-3 lemonmilk justify-content-center justify-content-lg-start">
										Newsletter abonnieren
									</div>
									<p class="d-flex justify-content-center justify-content-lg-start">Nach deiner Anmeldung erhältst du einen einmaligen Gutschein im Wert von 10% für unseren Shop.</p>
									<?php echo do_shortcode('[wc_mailchimp_subscribe_discount]');?>
									
								</div>
							</div>
						</div>
					</div>
				</div>  
			</div>
		</div>
	</div>