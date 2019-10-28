var app = new Vue({
    el: '#home',
    data: {
        selected:{},
        users:[]
    },
    mounted(){
        this.mostrar();
    },
    methods: {
        mostrar() {
            fetch('http://127.0.0.1:8000/getClientes', {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.json())
                .then(usuarios => {
                    //console.log(usuarios)
                    this.users = usuarios;
                })
        },
        seguro(user) {
            //console.log(user);
            this.selected = user;
            $('#edit').modal('show');
        },
        eliminar(){
            let datas = new FormData(document.getElementById('formu'));
            datas.append('id', this.selected.id);
            
            fetch('http://127.0.0.1:8000/eliminarCliente', {
                    method: 'POST',
                    body: datas
                })
                .then(res => res.json())
                .then(usuarios => {
                    console.log(usuarios)
                    console.log("eliminado");
                    this.mostrar();
                    $('#edit').modal('hide');
                })
        }
    }
});
