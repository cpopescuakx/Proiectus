<template>
    <div class="panel panel-default">
        <div class="panel-heading">Create Chat</div>
        <div class="panel-body">
            <form>
                <div class="form-group">
                    <input class="form-control" type="text" v-model="name" placeholder="Chat Name">
                </div>
                <div class="form-group">
                    <select v-model="users" multiple id="friends">
                        <option v-for="user in initialUsers" :value="user.id">
                            {{ user.username }}
                        </option>
                    </select>
                </div>
            </form>
        </div>
        <div class="panel-footer text-center">
            <button type="submit" @click.prevent="createChat" class="btn btn-primary">Create Chat</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['initialUsers', 'project'],
        data() {
            return {
                name: '',
                users: []
            }
        },
        methods: {
            createChat() {
                axios.post('/chats', {name: this.name, id_project: this.project, users: this.users})
                .then((response) => {
                    this.name = '';
                    this.users = [];
                    Bus.$emit('chatCreated', response.data);
                })
                .catch(error => {
                    console.log(error.response);
                });
            }
        }
    }
</script>
