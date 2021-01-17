let env = process.env.NODE_ENV;

let apis = {
    "production" : {
        "LOGIN_API" : "http://api.license.local/login",
        "SUBSCRIPTIONS_API" : "http://api.license.local/subscriptions",
        "PRODUCTS_API" : "http://api.license.local/products",
        "CUSTOMERS_API" : "http://api.license.local/customers",
        "TRANSACTIONS_API" : "http://api.license.local/transactions",
        "ACTIVATIONS_API" : "http://api.license.local/activations",
    },
    "development" : {
        "LOGIN_API" : "http://api.license.local/login",
        "SUBSCRIPTIONS_API" : "http://api.license.local/subscriptions",
        "PRODUCTS_API" : "http://api.license.local/products",
        "CUSTOMERS_API" : "http://api.license.local/customers",
        "TRANSACTIONS_API" : "http://api.license.local/transactions",
        "ACTIVATIONS_API" : "http://api.license.local/activations",
    }
}
export default apis[env];