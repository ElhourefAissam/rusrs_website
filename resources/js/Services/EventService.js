import makeRequest from "../httpRequests/makeRequest";
import methods     from "../httpRequests/reqMethodsInterface";
import Path        from "../EnvPath";

const url = Path.baseUrl+"Event";
const page= "?page=1"

export default {

        addEvent  : async(event)=>{
            return await makeRequest(methods.post,url,event)
        },
        editEvent : async(event)=>{
            return await makeRequest(methods.put, url+"/"+event.id ,event)
        },
        deleteEvent: async(id)=>{
            return await makeRequest(methods.delete,url+'/'+id )
        },
        listOfEvents: async (title="")=>{
            title = title!=""? "/"+title:""
            return await makeRequest(methods.get,url+ title + page)
        },

};
