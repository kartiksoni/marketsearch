var STORAGE_KEY = 'wishlist-store'
export default {
    fetch: function () {
        var products = JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]')
        if(products.length > 0)
        {
        products.forEach(function (product, index) {
            product.id = index
        });
        this.uid = products.length;
        }
        return products;
    },
    save: function (products) {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(products))
    }
}