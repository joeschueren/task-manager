let baseURL = "";

if (process.env.NODE_ENV === 'production') {
    baseURL = 'https://example.com/api';
} else {
    baseURL = 'http://localhost:8000/';
}

export default baseURL;