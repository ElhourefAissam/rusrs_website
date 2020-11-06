import axios from 'axios';

export default async (method, url,payload, config=null)=>{

    switch(method){
        case "POST" : {
            return  (await axios.post(url,payload,config)).data
        }
        case "GET" : {
             return (await axios.get(url)).data
        }
        case "PUT" :{
             return (await axios.put(url,payload)).data
        }
        case "DELETE" :{
             return (await axios.delete(url)).data
        }
        default : { return {"error": "an Uknown request Method is given or an occurs Error on the server"} }
    }

}
