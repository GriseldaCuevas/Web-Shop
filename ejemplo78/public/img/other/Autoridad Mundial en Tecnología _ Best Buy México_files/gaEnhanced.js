function _onProductImpressionsGA(impressions) {
    var impressions = impressions;
    impressions = impressions.replace("\'", "'");
    dataLayer.push({
        'ecommerce': {
            'currencyCode': 'MXN',
            'impressions': [impressions]
        }
    });
}

function _onProductClickGA(products, list) {
    var products = products;
    products = products.replace("\'", "'");
    dataLayer.push({
        'event': 'productClick',
        'ecommerce': {
            'click': {
                'actionField': {'list': list},
                'products': [products]
            }
        }
    });
}

function _onPurchaseGA(actionField, products) {
    var products = products;
    products = products.replace("\'", "'");
    // Send transaction data with a pageview if available
    // when the page loads. Otherwise, use an event when the transaction
    // data becomes available.
    dataLayer.push({
        'ecommerce': {
            'purchase': {
                'actionField': {
                    'id': actionField.id,
                    'affiliation': actionField.affiliation,
                    'revenue': actionField.revenue,
                    'tax': actionField.tax,
                    'shipping': actionField.shipping,
                    'coupon': actionField.coupon
                },
                'products': [
                    products
                ]
            }
        }
    });
}

function _measuringPromotionImpressions(promotions) {
    var promotions = promotions;
    promotions = promotions.replace("\'", "'");
    // An example of measuring promotion views. This example assumes that
    // information about the promotions displayed is available when the page loads.
    dataLayer.push({
        'ecommerce': {
            'promoView': {
                'promotions': [
                    promotions
                ]
            }
        }
    });
}

function _measuringPromotionClicks(promoObj) {
    var promoObj = promoObj;
    promoObj = promoObj.replace("\'", "'");
    dataLayer.push({
        'event': 'promotionClick',
        'ecommerce': {
            'promoClick': {
                'promotions': [
                    promoObj
                ]
            }
        }
    });
}

function _measuringCheckoutSteps(step, option, products) {
    var products = products;
    products = products.replace("\'", "'");
// { 'name': 'Triblend Android T-Shirt', 'id': '12345','price': '15.25','brand': 'Google','category': 'Apparel','variant': 'Gray','quantity': 1}
    dataLayer.push({
        'event': 'checkout',
        'ecommerce': {
            'checkout': {
                'actionField': {'step': step, 'option': option},
                'products': [
                    products
                ]
            }
        }
    });
}

function _measuringRemovalsShoppingCart(products) {
// Measure adding a product to a shopping cart by using an 'add' actionFieldObject
// and a list of productFieldObjects.
    if (typeof products === 'object') {
        dataLayer.push({
            'event': 'removeFromCart',
            'ecommerce': {
                'remove': {
                    'products': [
                        {
                            'name': products.name,
                            'id': products.id,
                            'price': products.price,
                            'brand': products.brand,
                            'category': products.category,
                            'variant': products.variant,
                            'quantity': products.quantity
                        }
                    ]
                }
            }
        });
    }
    if (typeof products === 'string') {
        var products = products;
        products = products.replace("\'", "'");
        dataLayer.push({
            'event': 'removeFromCart',
            'ecommerce': {
                'remove': {
                    'products': [products]
                }
            }
        });
    }

}

function _measuringAdditionsShoppingCart(products) {
// Measure adding a product to a shopping cart by using an 'add' actionFieldObject
// and a list of productFieldObjects.
    if (typeof products === 'object') {
        dataLayer.push({
            'event': 'addToCart',
            'ecommerce': {
                'currencyCode': 'MXN',
                'add': {
                    'products': [
                        {
                            'name': products.name,
                            'id': products.id,
                            'price': products.price,
                            'brand': products.brand,
                            'category': products.category,
                            'variant': products.variant,
                            'quantity': products.quantity
                        }
                    ]
                }
            }
        });
    }
    if (typeof products === 'string') {
        var products = products;
        products = products.replace("\'", "'");
        dataLayer.push({
            'event': 'addToCart',
            'ecommerce': {
                'currencyCode': 'MXN',
                'add': {
                    'products': [products]
                }
            }
        });
    }

}