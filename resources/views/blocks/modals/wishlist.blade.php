<modal-wishlist inline-template>
    <div v-if="visible" id="modal-wishlist" class="modal-container modal-wishlist">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button @click="closeModal()" type="button" class="close" data-dismiss="modal" aria-hidden="true"
                    >&times;</button>


                    <div class="wishlist-picker" v-if="wishlistPickerVisible">
                        <select v-model="selectorWishlist" name="wishlist-option">
                            <option value="">Choose Wishlist</option>
                            <option value="new">-- New Wishlist</option>
                            <option selected="@{{value == selectedWishlist.id}}" @click="chooseWishlist()" v-for="option in wishlistPickerOptions" :value="option.id">@{{ option.name }}</option>
                        </select>
                    </div>
                    <div class="wishlist-nametag">
                        <h4 v-if="selectedWishlist" class="modal-title">@{{ selectedWishlist.name }}</h4>
                    </div>
                    <div @click="clearWishlist" class="btn btn-default">Clear Wishlist</div>
                    <div v-if="wishlistNamerVisible && !selectedWishlist" class="form-group">
                        <input placeholder="Wishlist Name" type="text" name="wishlist-name" v-model="wishlistName">
                        <div @click="saveWishlist" class="btn btn-default">Create Wishlist</div>
                    </div>
                    <div v-if="wishlistNamerVisible && selectedWishlist" class="form-group">
                        <input placeholder="Wishlist Name" type="text" name="wishlist-name" v-model="selectedWishlist.name">
                        <div @click="saveWishlist" class="btn btn-default">Update Wishlist</div>
                    </div>

                </div>
                <div class="modal-body">
                    <div class="wishlist-product-container" v-if="products">
                        <div v-for="product in products" @click="viewProduct(product)" class="wishlist-product">
                            <div class="product-image">
                                <img :src="product.image_url"/>
                            </div>
                            <div class="product-data">
                                <div class="name">
                                    @{{ product.name }}
                                </div>
                                <div class="price">
                                    @{{ product.price }}
                                </div>
                                <div class="product-data-extra">
                                    <div class="product-description">
                                        @{{ product.description }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</modal-wishlist>