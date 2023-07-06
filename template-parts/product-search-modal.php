
<div class="modal fade" id="productSearchModal" tabindex="-1" aria-labelledby="productSearchModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="productSearchModalLabel">Nach Produkt suchen</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="d-flex border border-white rounded-5 header-search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <i class="bi bi-search fs-4 me-2"></i><input class="header-form-control w-100 rounded-5 pe-5 ps-3 bg-transparent border-0" type="search" placeholder="Suche..." aria-label="Search" name="s">
            <input type="hidden" name="post_type" value="product">
        </form>
      </div>
    </div>
  </div>
</div>