import makeRequest from "../httpRequests/makeRequest";
import methods     from "../httpRequests/reqMethodsInterface";
import Path        from "../EnvPath";

const url = Path.baseUrl+"Article";
const page= "?page=1"

export default {

        addArticle  : async(article)=>{
            return await makeRequest(methods.post,url,article)
        },
        editArticle : async(article)=>{
            return await makeRequest(methods.put, url+"/"+article.id ,article)
        },
        deleteArticle: async(id)=>{
            return await makeRequest(methods.delete,url+'/'+id )
        },
        listOfArticles: async (title="")=>{
            title = title!=""? "/"+title:""
            return await makeRequest(methods.get,url+ title + page)
        },

};

