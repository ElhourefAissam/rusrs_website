export default {
    baseUrl: process.env.NODE_ENV === 'production'
      ? "/production-sub-path/"
      : "http://websiterusrs.test/api/"
}
