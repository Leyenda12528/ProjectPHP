var app = new Vue({
    el: '#sa',
    data: {
        selected: {},
        users: [],
        hola: 'hola'
    },
    created() {
        fetch('http://127.0.0.1:8000/getAdmins', {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => res.json())
            .then(usuarios => {
                //console.log(usuarios)
                this.users = usuarios;
            });
    },
    methods: {
        mostar() {
            fetch('http://127.0.0.1:8000/getAdmins', {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.json())
                .then(usuarios => {
                    //console.log(usuarios)
                    this.users = usuarios;
                });
        },
        seguro(user) {
            this.selected = user;
            $('#seguro').modal('show');
        },
        eliminar() {
            let datas = new FormData(document.getElementById('erase'));
            datas.append('id', this.selected.id);
            fetch('http://127.0.0.1:8000/eliminarAdmin', {
                    method: 'POST',
                    body: datas
                })
                .then(res => res.json())
                .then(usuarios1 => {
                    console.log(usuarios1);
                    this.mostrar2();
                    $('#seguro').modal('hide');
                });
        },
        mostrar2() {
            fetch('http://127.0.0.1:8000/getAdmins', {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.json())
                .then(usuarios => {
                    //console.log(usuarios)
                    this.users = usuarios;
                });
        }

    }
});

var add = new Vue({
    el: '#add',
    data: {
        valor: 'hoal vue'
    },
    methods: {
        agregar() {
            let datas = new FormData(document.getElementById('f-add'));

            fetch('http://127.0.0.1:8000/registerA', {
                    method: 'POST',
                    body: datas
                })
                .then(res => res.json())
                .then(usuarios => {
                    console.log(usuarios)
                    console.log("response");
                    app.mostar();
                    $('#formu').modal('hide');
                })
                .catch(error => {
                    console.log(error.response);
                });
        }
    }
});