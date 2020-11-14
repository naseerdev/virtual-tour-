<template>
    <div class="container">
         <div class="row">
             <div style="padding:5px 2px !important" class="col-lg-10 col-md-8 "> 
              <input type="text" class="form-control form-control-lg input-custom" v-on:keyup.enter="sendChat" v-model="chat">
             </div>
         <div style="padding:5px 0px !important" class="col-lg-2 col-md-4 ">
                <button type="button" class="send-btn" v-on:click="sendChat" >Send<i class="ml-2 fa fa-arrow-right"></i></button>
             </div>
         </div>
      
    </div>
</template>

<script>
    
    export default {
        props: ['chats', 'userid', 'friendid'],
        data() {
            return {
                chat: ''
            }
        },
        methods: {
            sendChat: function(e) {
                if (this.chat != '') {
                    var data = {
                        chat: this.chat,
                        friend_id: this.friendid,
                        user_id: this.userid
                    }
                    this.chat = '';

                    axios.post('http://localhost:8080/virtualtour/chat/sendChat', data).then((response) => {
                        this.chats.push(data)
                    })
                }
            }
        }
    }

</script>
