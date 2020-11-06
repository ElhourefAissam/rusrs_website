import makeRequest from "../httpRequests/makeRequest";
import methods     from "../httpRequests/reqMethodsInterface";
import Path        from "../EnvPath";

const url = Path.baseUrl+"Member";
const page= "?page=1"

export default {

        addMember  : async(member)=>{
            return await makeRequest(methods.post,url,member)
        },
        editMember : async(member)=>{
            return await makeRequest(methods.put, url+"/"+member.id ,member)
        },
        deleteMember: async(id)=>{
            return await makeRequest(methods.delete,url+'/'+id )
        },
        listOfMembers: async (name="")=>{
            name = name!=""? "/"+name:""
            return await makeRequest(methods.get,url+ name + page)
        },

};
