<style scoped>
.red {
        color: red;
    }
    .green {
        color: green;
    }
</style>

<template>
<div style="padding-top:14px;margin-right:10px" class="float-left">
    <i class="fa fa-circle green" v-if="checkUser()"></i>
    <i class="fa fa-circle red" v-else></i>
    </div>

    
</template>
<script>
export default {
     props: ['friend', 'onlineusers'],
     methods: {
            checkUser: function() {
                return _.find(this.onlineusers, {id: this.friend.id});
            }
        }

    
}
</script>
