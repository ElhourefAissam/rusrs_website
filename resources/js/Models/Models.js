let Event = {
    id: "",
    title: "",
    description: "",
    place: "",
    address: "",
    start_date: "",
    end_date: ""
};

let Article = {
    id: "",
    title: "",
    article_body: "",
    author: ""
};

let Member = {
    id: "",
    full_name: "",
    facebook: "",
    position: ""
};

let Program = {
    id: "",
    title: "",
    link: "",
    programId:"",
};

let notification = {
    message: "",
    snackbar: false,
    color:"",
    timeout:6000,
};

let UploadImagesModel = {
    formData: new FormData(),
    config: {}
};

let notify = (message, color) => {
    let notif={
        color,
        message,
        snackbar:true,
    }
    return notif
}

export { Event, Article, Member, Program, UploadImagesModel, notification, notify };
