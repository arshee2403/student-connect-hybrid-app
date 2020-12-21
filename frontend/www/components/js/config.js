// This is a JavaScript file

// ConnectyCube application credentials
//
const CC_CREDENTIALS = {
   // appId: 19,
   // authKey: 'JHjjDn53msUDzX3',
   // authSecret: 'AAnMKH7N3b4xX79'
    appId: 371,
    authKey: '4qb-K8h6D2hwaBC',
    authSecret: 'Lt7DX9pMdy3UFJs'
};

const CC_CONFIG = {
    // endpoints: {
    //     api: "",
    //     chat: ""
    // },
    streamManagement: {
        enable: false
    },
    debug: {
        mode: 1
    }
};
var CC_USERS = JSON.parse($.ajax({
          url: "https://projects.techsilium.com/ReadUsersDataJSON.php",
          dataType: "json",
          async: false
          }).responseText);

/*var CC_USERS =[{id:71313,login:'omkar',password:'password@123'},{id:71315,login:'arshee',password:'password@123'},{id:71317,login:'maithili',password:'password@123'},{id:71318,login:'akhila',password:'password@123'},{id:71319,login:'sushmita',password:'password@123'},{id:73386,login:'Ruchika',password:'ruchikapatil'},{id:91458,login:'Aakash',password:'aakash@123'}];
  */

var appConfig = {
    dilogsPerRequers: 15,
    messagesPerRequest: 50,   
    usersPerRequest: 15,
    typingTimeout: 3 // 3 seconds
};

var CONSTANTS = {
    DIALOG_TYPES: {
        PRIVATE: 3,
        GROUPCHAT: 2,
        PUBLICCHAT: 1
    },
    ATTACHMENT: {
        TYPE: 'image',
        BODY: '[attachment]',
        MAXSIZE: 2 * 1000000, // set 2 megabytes,
        MAXSIZEMESSAGE: 'Image is too large. Max size is 2 mb.'
    },
    NOTIFICATION_TYPES: {
        NEW_DIALOG: '1',
        UPDATE_DIALOG: '2'
    }
};
