<template>
    <div>
        <chat v-for="chat in chats" :chat="chat" :key="chat.id_chat"></chat>
    </div>
</template>

<script>
    export default {
        props: ['initialChats', 'user', 'project'],
        data() {
            return {
                chats: []
            }
        },
        mounted() {
            this.chats = this.initialChats;
            Bus.$on('chatCreated', (chat) => {
                this.chats.push(chat);
            });
            console.log(this.user);
            this.listenForNewChats();
        },
        methods: {
            listenForNewChats() {
                Echo.private('users.' + this.user)
                    .listen('ChatCreated', (e) => {
                        this.chats.push(e.chat);
                    });
            }
        }
    }
</script>
