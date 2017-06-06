<div class="productResults">
    <product-results inline-template>
        <div class="container" id="main">
            <div class="grid">
                <div v-if="products">
                    <div v-if="display == 'grid'" class="grid-display">
                        Grid
                        <div v-for="product in products" class="grid-item">
                            <!-- Grid Display -->
                            <div v-if="product.source == 'ebay'" class="outer ebay col-xs-4">
                                <span class="">@{{ product.name }}</span>
                                <div class="col-xs-6">
                                    <img class="product-image" :src="product.image_url">
                                </div>
                                <div class="inner">
                                    <div class="overlay-menu">
                                        <a @click="addProductToWishlist(product)" class="btn btn-primary btn-sm">add to wishlist</a></h2>
                                        <a @click="goToProductPage(product)" class="btn btn-primary btn-sm">View Product</a></h2>
                                        <a @click="openProductLightbox(product)" class="btn btn-primary btn-sm">Open Lightbox</a></h2>
                                    </div>
                                    <div class="tile-footer">
                                        <span class="">@{{ product.price }}</span>
                                        <span class="vmid"><i @click="openProductLightbox(product)" class="fa fa-eye view" aria-hidden="true"></i></span>
                                    </div>
                                </div> <!-- end inner overlay-->
                            </div> <!-- end outer tile content-->
                            <div v-if="product.source == 'amazon'" class="outer amazon col-xs-4">
                                <span class="">@{{ product.name }}</span>
                                <img class="product-image" :src="product.image_url">
                                <div class="inner">
                                    <div class="overlay-menu">
                                        <a @click="addProductToWishlist(product)" class="btn btn-primary btn-sm">add to
                                        wishlist</a></h2>
                                        <a @click="goToProductPage(product)" class="btn btn-primary btn-sm">View
                                        Product</a></h2>
                                        <a @click="openProductLightbox(product)" class="btn btn-primary btn-sm">Open Lightbox</a></h2>
                                    </div>
                                    <div class="tile-footer">
                                        <span class="">@{{ product.price }}</span>
                                        <span class="vmid"><i @click="openProductLightbox(product)" class="fa fa-eye view" aria-hidden="true"></i></span>
                                    </div>
                                </div> <!-- end inner overlay-->
                            </div> <!-- end outer tile content-->
                            <div v-if="product.source == 'etsy'" class="outer etsy col-xs-4">
                                <span class="">@{{ product.name }}</span>
                                <img class="product-image" :src="product.image_url">
                                <div class="inner">
                                    <div class="overlay-menu">
                                        <a @click="addProductToWishlist(product)" class="btn btn-primary btn-sm">add to
                                        wishlist</a></h2>
                                        <a @click="goToProductPage(product)" class="btn btn-primary btn-sm">View
                                        Product</a></h2>
                                        <a @click="openProductLightbox(product)" class="btn btn-primary btn-sm">Open Lightbox</a></h2>
                                    </div>
                                    <div class="tile-footer">
                                        <span class="">@{{ product.price }}</span>
                                        <span class="vmid"><i @click="openProductLightbox(product)" class="fa fa-eye view" aria-hidden="true"></i></span>
                                    </div>
                                </div> <!-- end inner overlay-->
                            </div>
                        </div> <!-- End item-->
                    </div>
                    <div v-if="display == 'list'" class="list-display">
                        <div v-for="product in products" class="list-item">
                            <!-- List Display-->
                            <div v-if="product.source == 'ebay'" class="outer ebay col-xs-12">
                                <span class="">@{{ product.name }}</span>
                                <div class="col-xs-6">
                                    <img class="product-image" :src="product.image_url">
                                </div>
                                <div class="inner">
                                    <div class="overlay-menu">
                                        <a @click="addProductToWishlist(product)" class="btn btn-primary btn-sm">add to
                                        wishlist</a></h2>
                                        <a @click="goToProductPage(product)" class="btn btn-primary btn-sm">View
                                        Product</a></h2>
                                        <a @click="openProductLightbox(product)" class="btn btn-primary btn-sm">Open Lightbox</a></h2>
                                    </div>
                                    <div class="tile-footer">
                                        <span class="price">$@{{ product.price }}</span>
                                    </div>
                                </div> <!-- end inner overlay-->
                            </div> <!-- end outer tile content-->
                            <div v-if="product.source == 'amazon'" class="outer amazon col-xs-12">
                                <span class="">@{{ product.name }}</span>
                                <img class="product-image" :src="product.image_url">
                                <div class="inner">
                                    <div class="overlay-menu">
                                        <a @click="addProductToWishlist(product)" class="btn btn-primary btn-sm">add to
                                        wishlist</a></h2>
                                        <a @click="goToProductPage(product)" class="btn btn-primary btn-sm">View
                                        Product</a></h2>
                                    </div>
                                    <div class="tile-footer">
                                        <span class="">@{{ product.price }}</span>
                                        <span class="vmid"><i @click="openProductLightbox(product)" class="fa fa-eye view" aria-hidden="true"></i></span>
                                    </div>
                                </div> <!-- end inner overlay-->
                            </div> <!-- end outer tile content-->
                            <div v-if="product.source == 'etsy'" class="outer etsy col-xs-12">
                                <span class="">@{{ product.name }}</span>
                                <img class="product-image" :src="product.image_url">
                                <div class="inner">
                                    <div class="overlay-menu">
                                        <a @click="addProductToWishlist(product)" class="btn btn-primary btn-sm">add to
                                        wishlist</a></h2>
                                        <a @click="goToProductPage(product)" class="btn btn-primary btn-sm">View
                                        Product</a></h2>
                                    </div>
                                    <div class="tile-footer">
                                        <span class="">@{{ product.price }}</span>
                                        <span class="vmid"><i @click="openProductLightbox(product)" class="fa fa-eye view" aria-hidden="true"></i></span>
                                    </div>
                                </div> <!-- end inner overlay-->
                            </div>
                        </div> <!-- End item-->
                    </div>
                </div>
            </div> <!-- end grid-->
        </div> <!-- end wrapper-->
    </product-results>
</div>