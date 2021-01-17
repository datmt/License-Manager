function getToken() {
    return localStorage.getItem('access_token');
}

function removeToken() {
    localStorage.removeItem('access_token');
}

function updateAccessToken(token) {
    localStorage.setItem('access_token', token);
}

let isAuthenticated = getToken() !== null;
export {
    getToken,
    removeToken,
    updateAccessToken,
    isAuthenticated
}
