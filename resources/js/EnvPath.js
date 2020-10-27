

export default {
    baseUrl: process.env.NODE_ENV === 'production'
      ? '/production-sub-path/'
      : "http://localhost/api/"
}
