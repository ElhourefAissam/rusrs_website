export default {
    baseUrl: process.env.NODE_ENV === 'production'
      ? "/production-sub-path/"
      : "http://rusrs-website.test/api/"
}
