var app = new Vue({
    el: '#vuvu',
    data: {
        pass: '',
        clase: '',
        mjs: '',
        mjs2: '',
        ocultar: '',
        ocultar2: 'd-none'
    },
    methods: {
        /**
         * var formdata = new FormData();
          formdata.append("nombre", this.Tarea.valor);
          formdata.append("fecha", this.Fechai.valor);
          formdata.append("horai", this.Horai.valor);
         */
        validar() {
            let datas = new FormData(document.getElementById('formuV'));
            fetch('http://127.0.0.1:8000/validarPass', {
                    method: 'POST',
                    body: datas
                })
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    var tipo = data.dato;
                    console.log(data.dato)
                    if (tipo === 0) {
                        this.clase = "is-invalid border border-danger";
                        this.mjs = "Contraseña Incorrecta";
                    } else {
                        this.clase = "";
                        this.mjs = "";
                        this.mjs2 = "Puede Imprimir su ticket";
                        this.ocultar = "d-none";
                        this.ocultar2 = "";
                        //this.doTicket();
                    }

                })
        },
        doTicket() {
            //console.log("vine");
            /*let datas = new FormData(document.getElementById('f-ticket'));
            datas.append('pasajeros', document.getElementById("numPasajeros").innerHTML);
            datas.append('NoVuelo', "Vuelo número " + document.getElementById("nVuelo").innerHTML);
            datas.append('fecha', document.getElementById("fecha1").innerHTML);
            datas.append('desde', document.getElementById("desde").innerHTML);
            datas.append('hacia', document.getElementById("hacia").innerHTML);
            datas.append('horaPartida', "Hora de partida " + document.getElementById("horaPartida").innerHTML);
            datas.append('claseTarifa', document.getElementById("claseT").innerHTML);
            datas.append('Precio', "$ " + document.getElementById("precioT").innerHTML + ".00");
            console.log(datas);*/

            /*var request = new XMLHttpRequest();
            request.open("POST", "http://127.0.0.1:8000/ticket");
            request.send(datas);*/

            let formus = document.getElementById('f-ticket');

            var input = document.createElement("input");
            input.type = "text";
            input.name = "pasajeros";
            input.className="d-none";
            input.value = document.getElementById("numPasajeros").innerHTML;
            formus.appendChild(input);

            var input = document.createElement("input");
            input.type = "text";
            input.name = "NoVuelo";
            input.className="d-none";
            input.value = "" + document.getElementById("nVuelo").innerHTML;
            formus.appendChild(input);

            var input = document.createElement("input");
            input.type = "text";
            input.name = "fecha";
            input.className="d-none";
            input.value = document.getElementById("fecha1").innerHTML;
            formus.appendChild(input);
            //
            var input = document.createElement("input");
            input.type = "text";
            input.name = "desde";
            input.className="d-none";
            input.value = document.getElementById("desde").innerHTML;
            formus.appendChild(input);
            var input = document.createElement("input");
            input.type = "text";
            input.name = "hacia";
            input.className="d-none";
            input.value = document.getElementById("hacia").innerHTML;
            formus.appendChild(input);
            var input = document.createElement("input");
            input.type = "text";
            input.name = "horaPartida";
            input.className="d-none";
            input.value = "Hora de partida " + document.getElementById("horaPartida").innerHTML;
            formus.appendChild(input);
            var input = document.createElement("input");
            input.type = "text";
            input.name = "claseTarifa";
            input.className="d-none";
            input.value = document.getElementById("claseT").innerHTML;
            formus.appendChild(input);
            var input = document.createElement("input");
            input.type = "text";
            input.name = "Precio";
            input.className="d-none";
            input.value =  document.getElementById("precioT").innerHTML;
            formus.appendChild(input);

                        
            formus.submit();
            $("#exampleModal").modal("hide");
            this.ocultar="";
            this.ocultar2="d-none";
            this.mjs2="";
            this.pass="";

            /*fetch('http://127.0.0.1:8000/Reportes', {
                    method: 'POST',
                    body: datas
                })
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                })*/
        }
    }
});
