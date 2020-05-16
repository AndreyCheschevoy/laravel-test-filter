<template>
    <div class="row">
        <div class="col-sm-4 col-lg-2">
            <div class="card m-1 p-1">
                Filters
                <div class="card-body">
                    <form id="filter">
                        <div class="form-group">
                            <label for="search">Search</label>
                            <input type="text" class="form-control" id="search" name="name" v-model="form.name">
                        </div>
                        <div class="form-group form-check">
                            <h6>Age</h6>
                            <div v-for="(item, index) in age">
                                <input type="checkbox" class="form-check-input" :id="'hobby' + index" v-model="form.age"
                                       :value="item">
                                <label class="form-check-label" :for="'hobby' + index">{{item}}</label>
                            </div>
                        </div>
                        <div class="form-group form-check">
                            <h6>Hobby</h6>
                            <div v-for="(item, index) in hobby">
                                <input type="checkbox" class="form-check-input" :id="'hobby' + index"
                                       v-model="form.hobby"
                                       :value="item">
                                <label class="form-check-label" :for="'hobby' + index">{{item}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" v-model="form.status" id="s-on" value="1">

                                <label class="form-check-label" for="s-on">
                                    Online
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" v-model="form.status" id="s-off" value="2">

                                <label class="form-check-label" for="s-off">
                                    Offline
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" v-model="form.gender" id="g-male"
                                       value="1">

                                <label class="form-check-label" for="g-male">
                                    male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" v-model="form.gender" id="g-female"
                                       value="2">

                                <label class="form-check-label" for="g-female">
                                    female
                                </label>
                            </div>
                        </div>
                        <button @click.prevent="getData" class="btn btn-primary">Submit</button>
                        <button @click.prevent="clean">Clean</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-lg-10">
            <div class="row d-flex justify-content-center">
                <div v-for="user in users" class="col-sm-6 col-lg-3 col-xl-2 card m-1 p-1">
                    <p>name: {{user.name}}</p>
                    <p>age: {{user.age}}</p>
                    <p>gender: {{user.gender === 1 ? 'male' : 'female'}}</p>
                    <p>status: {{user.status === 1 ? 'online' : 'offline'}}</p>
                    <p>hobby: {{user.hobby}}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data: () => ({
            form: {
                name: null,
                age: [],
                hobby: [],
                status: null,
                gender: null,
            },
            users: [],
            hobby: [],
            age: [],
        }),
        // computed: {
        //     filteredUser() {
        //         return this.users.filter(user => {
        //             return user.name.toLowerCase().indexOf(this.form.name.toLowerCase()) !== -1
        //         })
        //     }
        // },
        mounted() {
            this.getData()
        },
        methods: {
            async getData() {
                this.users = [];
                this.hobby = [];
                this.age = [];

                await
                    axios
                        .get(`/`, {
                            params: {
                                name: this.form.name,
                                age: this.form.age,
                                hobby: this.form.hobby,
                                status: this.form.status,
                                gender: this.form.gender,
                            }
                        })
                        .then(res => {
                            this.users = res.data.users;
                            this.hobby = res.data.hobby;
                            let agesData = res.data.age;
                            let ages = [];

                            for (let [key, value] of Object.entries(agesData)) {
                                ages.push(value);
                            }

                            this.age = ages.sort();
                        })
                        .catch(error => {
                            console.log(error);
                        });
            },

            clean() {
                this.form = {
                    name: null,
                    age: null,
                    hobby: null,
                    status: null,
                    gender: null,
                };
                this.getData()
            }
        }
    }
</script>
