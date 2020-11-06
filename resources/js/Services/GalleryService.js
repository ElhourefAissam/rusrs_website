import makeRequest from "../httpRequests/makeRequest";
import methods     from "../httpRequests/reqMethodsInterface";
import Path        from "../EnvPath";

const url = Path.baseUrl+"Gallery";
const page= "?page=1"

export default {

        addGallery  : async(gallery)=>{
            return await makeRequest(methods.post,url,gallery)
        },
        editGallery : async(gallery)=>{
            return await makeRequest(methods.put, url+"/"+gallery.id ,gallery)
        },
        deleteGallery: async(id)=>{
            return await makeRequest(methods.delete,url+'/'+id )
        },
        listOfGallerys: async (name="")=>{
            name = name!=""? "/"+name:""
            return await makeRequest(methods.get,url+ name + page)
        },

};
