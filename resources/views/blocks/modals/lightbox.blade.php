<modal-lightbox inline-template>
    <div v-if="visible" id="lightbox-modal" class="modal-container">
        <div class="modal-header">
            <button @click="closeModal()" type="button" class="close" data-dismiss="modal" aria-hidden="true"
            >&times;</button>
            <h4 class="modal-title">Product Image</h4>
        </div>
        <div class="modal-dialog">
            <button @click="closeModal()" id="closelightbox" type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
            <img v-if="image" :src="image">
        </div>
    </div>
</modal-lightbox>