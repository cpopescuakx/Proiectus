<template>
    <div>
    <div class="panel panel-primary">
            <div class="panel-heading" id="accordion">
                <span class="glyphicon glyphicon-comment">{{ chat.name }}</span>
                <div class="btn-group pull-right">
                    <a type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-parent="#accordion-" :href="'#collapseOne-' + chat.id_chat">
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                </div>
            </div>
            <!-- panel-collapse collapse -->
            <div class="" :id="'collapseOne-' + chat.id_chat">
                <div class="panel-body chat-panel">
                    <ul class="chat">
                        <li v-for="message in messages">
                        <!-- <span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span> -->
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font"></strong>
                                </div>
                                <p>
                                    
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input type="text" class="btn-input form-control input-sm" placeholder="Type your message here..." v-model="message" @keyup.enter="store()" autofocus />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat" @click.prevent="store()">
                                Send</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['chat'],
        data() {
            return {
                messages: [],
                message: '',
                chat_id: this.chat.id_chat
            }
        },
        mounted() {
            this.listenForNewMessage();
        },
        methods: {
            store() {
                axios.post('/messages', {content: this.message, id_chat: this.chat.id_chat})
                .then((response) => {
                    this.message = '';
                    this.messages.push(response.data);
                });
            },
            listenForNewMessage() {
                Echo.private('chats.' + this.chat.id_chat)
                    .listen('NewMessage', (e) => {
                        this.messages.push(e);
                    });
            }
        }
    }
</script>
