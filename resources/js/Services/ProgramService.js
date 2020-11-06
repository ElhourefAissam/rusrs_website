import makeRequest from "../httpRequests/makeRequest";
import methods     from "../httpRequests/reqMethodsInterface";
import Path        from "../EnvPath";

const url = Path.baseUrl+"Program";
const page= "?page=1"

export default {

        addProgram  : async(program)=>{
            return await makeRequest(methods.post,url,program)
        },
        editProgram : async(program)=>{
            return await makeRequest(methods.put, url+"/"+program.id ,program)
        },
        deleteProgram: async(id)=>{
            return await makeRequest(methods.delete,url+'/'+id )
        },
        listOfPrograms: async (title="")=>{
            title = title!=""? "/"+title:""
            return await makeRequest(methods.get,url + title + page)
        },

};
