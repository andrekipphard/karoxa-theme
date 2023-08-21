<!-- Modal -->
<div class="modal fade" id="currencyModal" tabindex="-1" aria-labelledby="currencyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column align-items-center pb-5">
        <h1 class="modal-title text-center fs-5 mb-3" id="currencyModalLabel">Wählen Sie Ihre Währung</h1>
        <p>Preise anzeigen in € 🇪🇺 oder CHF 🇨🇭</p>
        <?php echo do_shortcode('[wcc_switcher]');?>
      </div>
    </div>
  </div>
</div>