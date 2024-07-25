<link rel="stylesheet" href="/asted/components/site.modalImage/style.css">
<div id="modal" class="modal">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content order__modal-content">
      <button type="button" class="close modal-close-btn" id="closeModal">
        <span aria-hidden="true">&times;</span>
      </button>
      <div class="modal-body order__modal-body" id="backCallForm">
        <h3 class="modal-title">Вставить изображение</h3>
        <div id="tab-container">
          <ul class="d-flex position-relative">
            <li><a href="#tab1" id="tab-link-1">Загрузить</a></li>
            <li><a href="#tab2" class="active" id="tab-link-2">Библиотека</a></li>
            <li class="position-absolute" style="right: 0;"><input type="text" id="searchImg" placeholder="поиск"><span id="clearSearch" class="" aria-hidden="true">×</span></li>
          </ul>
          <div id="tab1" class="tab-content">
            <form id="upload-form" method="post" enctype="multipart/form-data">
              <div>
                <input type="file" name="files[]" multiple="multiple" id="file-input">
                <label for="file-input">Выберите файлы</label>
              </div>
              <div id="drop-zone">
                <p>Перетащите файлы сюда, чтобы загрузить</p>
              </div>
              <div class="input-file-list"></div>
              <button type="submit" class="btn btn-primary text-center m-0">Загрузить</button>
            </form>

          </div>
          <div id="tab2" class="tab-content">
            <div class="parent-gallery">
              <div class="gallery">
              </div>
            </div>
            <button id="addImages" type="button" role="button" class="btn btn-primary text-center m-0"><span class="button_label">Добавить</span></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
#gallery .gallery-item{
  cursor: grab;
}
</style>
<script src="/asted/components/site.modalImage/script.js"></script>